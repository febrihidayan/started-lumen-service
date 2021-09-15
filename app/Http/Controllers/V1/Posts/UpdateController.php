<?php

namespace App\Http\Controllers\V1\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke(Request $request, $id)
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

        $post = Post::find($id);

        $post = $post->update($request->all());

        return response()->json($post);
    }
}
