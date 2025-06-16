@extends('frontend.layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Tag</h1>

        <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Tag Name</label>
                <input type="text" name="name" value="{{ old('name', $tag->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('tags.index') }}"
                   class="text-blue-600 hover:underline">← Back</a>

                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
