<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Tag;
use App\Services\EditorJsParser;

class PostController extends Controller
{
    public function show(String $slug)
    {
        $post = Post::where(['slug'=>$slug, 'is_published'=>1, 'deleted_at'=>null])->firstOrFail();
        $parser = new EditorJsParser($post->body);
        $htmlContent = $parser->render();

        $tagIds = $post->tags->pluck('id')->toArray();
        $relatedPosts = collect();
        if (count($tagIds) > 0)
            $relatedPosts = Post::query()
                ->whereHas('tags', function ($query) use ($tagIds) {$query->whereIn('tags.id', $tagIds);})
                ->withCount(['tags' => function ($query) use ($tagIds) {$query->whereIn('tags.id', $tagIds);}])
                ->where('id', '!=', $post->id)
                ->orderByDesc('tags_count')
                ->latest()
                ->take(4)
                ->get();


        $popularTags = Tag::withCount('posts')->orderBy('posts_count', 'desc')
            ->take(4)
            ->get();
        return view('layouts.test', [
            'post' => $post,
            'htmlContent' => $htmlContent,
            'popularTags' => $popularTags,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
