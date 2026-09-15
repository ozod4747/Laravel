@extends('layouts.main')

@section('content')

    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">

            @csrf
            @method('patch')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title">Title</label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    id="title"
                    value="{{ $post->title }}"
                    placeholder="Title"
                >
            </div>


            {{-- Content --}}
            <div class="mb-3">
                <label for="content">Content</label>

                <textarea
                    name="content"
                    class="form-control"
                    id="content"
                    placeholder="Content"
                >{{ $post->content }}</textarea>
            </div>


            {{-- Image --}}
            <div class="mb-3">
                <label for="image">Image</label>

                <input
                    type="text"
                    name="image"
                    class="form-control"
                    id="image"
                    value="{{ $post->image }}"
                    placeholder="Image"
                >
            </div>


            {{-- Category --}}
            <div class="mb-3">
                <label for="category">Category</label>

                <select
                    class="form-control"
                    id="category"
                    name="category_id"
                >

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $category->id == $post->category_id ? 'selected' : '' }}
                        >
                            {{ $category->title }}
                        </option>

                    @endforeach

                </select>
            </div>


            {{-- Tags --}}
            <div class="mb-3">
                <label for="tags">Tags</label>

                <select
                    class="form-control"
                    id="tags"
                    name="tags[]"
                    multiple
                >

                    @foreach($tags as $tag)

                        <option
                            value="{{ $tag->id }}"
                            {{ $post->tags->contains($tag->id) ? 'selected' : '' }}
                        >
                            {{ $tag->title }}
                        </option>

                    @endforeach

                </select>
            </div>


            {{-- Update button --}}
            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>
    </div>

@endsection
