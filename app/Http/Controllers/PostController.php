<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function getAllPosts()
    {
        $posts = Post::get();

        return PostCollection::make($posts);
    }

    public function getPostById($id)
    {
        $post = Post::where('id', $id)->with(['user'])->first();

        if (!$post) {
            return response(['data' => 'Not found'], 404);
        }

        return PostResource::make($post);
    }

    public function createPost(StorePostRequest $request)
    {
        try {
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

        } catch (Exception $e) {
            return response()->json([
                'data' => $e->getMessage()
            ], 501);
        }

        return PostResource::make($post);
    }
}
