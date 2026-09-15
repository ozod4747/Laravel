<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'tags' => 'nullable|array',
        ]);

        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('ochdi  ');
    }

    public function firstOrCreate()
    {


        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some bla bla',
            'likes' => 505,
            'is_published' => 1,
        ];


        $post = Post::firstOrCreate([
            'title' => 'some content',
        ], [

            'title' => 'some content',
            'content' => 'some  content',
            'image' => 'some imageblabla.ppg',
            'likes' => 505,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    //firstOrCreate
    //updateOrCreate

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => ' updateorcreatesome post',
            'content' => 'updateorcreatesome some content',
            'image' => 'updateorcreatesome some bla bla',
            'likes' => 55,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate([
            'title' => ' title not of post form phpstorm',
        ], [

            'title' => ' title not of post form phpstorm',
            'content' => ' it is not update some content',
            'image' => 'it is not update some bla bla',
            'likes' => 55,
            'is_published' => 0,
        ]);
        dump($post->content);
        dd(222222);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }
}
