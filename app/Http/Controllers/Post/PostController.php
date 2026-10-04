<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\Post\Service;

class PostController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, [
            'queryParams' => $data
        ]);

        $posts = Post::filterRequest($filter)->paginate(10);
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {

        return new PostResource($post);
//        return view('post.show', compact('post'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $post = $this->service->store($data);


        return new PostResource($post);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->service->update($post, $data);

        return new PostResource($post);
    }
}
