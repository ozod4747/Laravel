<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store(array $data)
    {
        $post = new Post();
        $post->image = $data['image'];
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->is_published = $data['is_published'];
        $post->category_id = $data['category_id'];
        $post->save();

        $post->tags()->attach($data['tags']);
        return $post;
    }

    public function update($post, $data)
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return $post->fresh();
    }
}
