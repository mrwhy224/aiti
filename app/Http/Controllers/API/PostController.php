<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Attachment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function add()
    {
        $uploadToken = (string) Str::uuid();
        $tags = Tag::all();

        return view('layouts.vuexy.pages.admin.post_add', [
            'tags' => $tags,
            'uploadToken' => $uploadToken
        ]);
    }
    public function upload(Request $request)
    {$request->validate([
        'image'        => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'upload_token' => 'required|string',
    ]);

        $file = $request->file('image');


        $path = $file->store('uploads', 'public');

        // ۳. ایجاد رکورد در دیتابیس بر اساس مایگریشن شما
        $attachment = Attachment::create([
            // فیلدهای فایل
            'file_path'     => $path,
            'original_name' => $file->getClientOriginalName(),
            'mime_type'     => $file->getMimeType(),
            'size'          => $file->getSize(),

            // فیلدهای استراتژی توکن موقت
            'session_token'   => $request->upload_token,
            'attachable_id'   => null, // از nullableMorphs
            'attachable_type' => null, // از nullableMorphs
        ]);

        // ۴. بازگرداندن پاسخ JSON برای Editor.js
        return response()->json([
            'success' => 1,
            'file' => [
                'url' => Storage::url($attachment->file_path),
                'id'  => $attachment->id  // <-- این برای تصویر شاخص ضروری است
            ]
        ]);
    }
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
        $validatedData = $request->validate([
            'title'               => 'required|string|max:255',
            'excerpt'             => 'nullable|string',
            'body'                => 'required|json', // محتوای Editor.js
            'featured_image_path' => 'nullable|string|max:2048', // URL آپلود شده
            'upload_token'        => 'required|string',
            'tags'                => 'nullable|array',
            'tags.*'              => 'exists:tags,id',
        ]);

        try {
            $article = Post::create([
                'user_id'             => Auth::id(),
                'title'               => $validatedData['title'],
                'slug'                => Str::slug($validatedData['title']), // باید یونیک بودن را چک کنید
                'excerpt'             => $validatedData['excerpt'],
                'body'                => $validatedData['body'], // ذخیره JSON
                'featured_image_path' => $validatedData['featured_image_path'],
                'is_published'        => true, // یا هر منطق دیگری که دارید
                'published_at'        => now(),
            ]);

            if (!empty($validatedData['tags']))
                $article->tags()->sync($validatedData['tags']);

            Attachment::where('session_token', $validatedData['upload_token'])
                ->whereNull('attachable_id')
                ->update([
                    'attachable_id'   => $article->id,
                    'attachable_type' => Post::class,
                    'session_token'   => null,
                ]);

            return response()->json([
                'success'     => true,
                'message'     => 'مطلب با موفقیت ایجاد شد!',
                'redirect_url' => route('post_list')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطایی رخ داد: ' . $e->getMessage()
            ], 500);
        }
    }
}
