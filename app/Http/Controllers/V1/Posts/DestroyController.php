<?php

namespace App\Http\Controllers\V1\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke($id)
    {
        $post = Post::find($id);

        $post = $post->delete();

        return response()->json($post);
    }
}
