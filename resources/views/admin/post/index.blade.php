@extends('layouts.admin')

@section('title', 'Posts')

@section('content_header') <h1>Posts</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">All Posts</h3>

            <div class="card-tools">
                <a href="{{ route('post.create') }}" class="btn btn-primary">
                    Add Post
                </a>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>

                        <td>
                            {{ $post->title }}
                        </td>

                        <td>
                            {{ Str::limit($post->content, 100) }}
                        </td>

                        <td>
                            <a href="{{ route('post.show', $post->id) }}"
                               class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('post.edit', $post->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $posts->links() }}
            </div>

        </div>

    </div>
    ```

@stop
