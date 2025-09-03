@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-extrabold text-indigo-700">📚 Blogposts</h1>
        <a href="{{ url('/posts/create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg shadow-lg font-semibold">
            + Nieuwe Post
        </a>
    </div>

    @if($posts->isEmpty())
        <p class="text-gray-600">Er zijn nog geen posts.</p>
    @else
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200 hover:shadow-2xl transition">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">
                        <a href="{{ url('/posts/' . $post->id) }}" class="hover:text-indigo-600">
                            {{ $post->titel }}
                        </a>
                    </h2>
                    <p class="text-gray-700 line-clamp-3">{{ Str::limit($post->inhoud, 120) }}</p>
                    <div class="mt-4 text-sm text-orange-500 font-medium">
                        🗓 {{ $post->created_at->format('d-m-Y') }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
