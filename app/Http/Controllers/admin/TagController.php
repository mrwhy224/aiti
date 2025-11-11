<?php

namespace App\Http\Controllers\admin; // اطمینان حاصل کنید که namespace درست است

use App\Http\Controllers\Controller;
use App\Models\Tag; // مدل تگ را ایمپورت کنید
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $tags = Tag::withCount('posts')->get();
            return response()->json([
                'ok' => true,
                'message' => 'ok',
                 'data' => $tags
            ], 200);
        }
        return view('layouts.vuexy.pages.admin.tags');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        $tag = Tag::create($validatedData);
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'تگ با موفقیت ایجاد شد.',
                'tag' => $tag->loadCount('articles')
            ], 201); // 201 = Created
        }
        return redirect()->route('admin.tags.index')->with('success', 'تگ با موفقیت ایجاد شد.');
    }

    public function show(Tag $tag)
    {
        return response()->json($tag->loadCount('articles'));
    }

    public function edit(Tag $tag)
    {
        return redirect()->route('admin.tags.index');
    }

    /**
     * به‌روزرسانی تگ
     */
    public function update(Request $request, Tag $tag)
    {
        $validatedData = $request->validate([
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('tags')->ignore($tag->id),
            ],
        ]);

        $tag->update($validatedData);

        // پاسخ API
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'تگ با موفقیت به‌روزرسانی شد.',
                'tag' => $tag->fresh()->loadCount('articles')
            ]);
        }

        // پاسخ وب
        return redirect()->route('admin.tags.index')
            ->with('success', 'تگ با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Request $request, Tag $tag)
    {

        $tag->delete();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'تگ با موفقیت حذف شد.']);
        }
        return redirect()->route('admin.tags.index')
            ->with('success', 'تگ با موفقیت حذف شد.');
    }
}
