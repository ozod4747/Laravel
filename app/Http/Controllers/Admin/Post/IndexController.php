<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, [
            'queryParams' => $data
        ]);

        $posts = Post::filterRequest($filter)->paginate(10);
//        dd($posts);
        return view('admin.post.index', compact('posts'));
    }
}
