<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

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
}
