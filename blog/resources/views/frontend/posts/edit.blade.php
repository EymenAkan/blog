@extends('frontend.layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Post</h1>

        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Body</label>
                <textarea name="description" rows="6"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $post->description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="formFile">Image</label>
                <input name="image" type="file"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if($post->image)
                    <img src="{{ asset('frontend/assets/img/' . $post->image) }}" alt="Current Image" class="mt-2 max-h-40">
                @endif
            </div>

            <div class="mt-4">
                <label class="block font-semibold mb-1">Tags</label>
                <div class="d-flex flex-wrap">
                    @foreach($tags as $tag)
                        <div class="form-check me-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="tags[]"
                                id="tag{{ $tag->id }}"
                                value="{{ $tag->id }}"
                                {{ (in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'checked' : '') }}
                            >
                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('posts.index') }}"
                   class="text-blue-600 hover:underline">← Back</a>

                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
