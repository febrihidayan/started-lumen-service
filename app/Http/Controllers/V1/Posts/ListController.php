<?php

namespace App\Http\Controllers\V1\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke(Request $request)
    {
        $q = $request->q;

        $posts = Post::when($q, function($query) use ($q) {

                return $query
                    ->where('title', 'like', "%$q%");

            })
            ->paginate($request->limit);

        return response()->json($posts);
    }
}
