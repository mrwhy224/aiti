<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Services\EditorJsParser;

class PostController extends Controller
{
    public function show(String $slug)
    {
        $post = Post::where(['slug'=>$slug, 'is_published'=>1, 'deleted_at'=>null])->firstOrFail();
        $parser = new EditorJsParser($post->body);
        $htmlContent = $parser->render();
        return view('layouts.test', [
            'post' => $post,
            'htmlContent' => $htmlContent,
        ]);
    }
}
