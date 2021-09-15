<?php

namespace App\Http\Controllers\V1\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'body' => 'required|max:5000',
            'status' =>
                sprintf(
                    "required|in:%s,%s",
                    Post::STATUS_DRAFT,
                    Post::STATUS_PUBLIC
                )
        ]);

        $post = Post::create($request->all());

        return response()->json($post);
    }
}
