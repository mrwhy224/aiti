<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('user', 'tags')->withCount('requestLogs','comments')->get();
        $resourceCollection = PostResource::collection($posts);
        $data = $resourceCollection->toArray(request());
        $data = array_map(function ($post) {
            unset($post['body']);
            return $post;
        }, $data);
        return response()->success('Response was rendered successfully', $data);
    }
    public function store(Request $request)
    {
        // مرحله ۱: اعتبارسنجی داده‌های ورودی شامل Slug
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            // Slug می‌تواند خالی باشد اما در صورت وجود باید یکتا باشد
            // توجه: چون ما در کد خودمان یکتایی را مدیریت می‌کنیم، می‌توانیم قانون 'unique' را از اینجا برداریم
            // یا آن را نگه داریم تا یک پیام خطای اولیه به کاربر بدهد. من آن را نگه می‌دارم.
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category_id' => 'required|integer|exists:categories,id',
            'summary' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'body' => 'required|json',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // مرحله ۲: مدیریت آپلود تصویر (بدون تغییر)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($request->title, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $imagePath = 'images/posts/' . $imageName;
        }

        // --- شروع بخش جدید: ایجاد و مدیریت Slug ---
        // اگر کاربر Slug را دستی وارد کرده، از آن استفاده کن؛ در غیر این صورت، از روی عنوان بساز
        $slug = $request->slug ? Str::slug($request->slug, '-') : Str::slug($request->title, '-');

        // چک می‌کنیم که Slug منحصر به فرد باشد. اگر نبود، یک عدد به انتهای آن اضافه می‌کنیم.
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        // --- پایان بخش جدید ---

        // مرحله ۳: ایجاد و ذخیره پست جدید در دیتابیس
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->slug = $slug; // <- Slug ایجاد شده اینجا ذخیره می‌شود
            $post->category_id = $request->category_id;
            $post->summary = $request->summary;
            $post->image = $imagePath;
            $post->body = $request->body;

            $post->save();

            // مرحله ۴: بازگرداندن کاربر با پیام موفقیت
            return redirect()->route('admin.posts.index')->with('success', 'پست جدید با موفقیت ایجاد شد.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'خطایی در هنگام ذخیره پست رخ داد: ' . $e->getMessage())->withInput();
        }
    }
}
