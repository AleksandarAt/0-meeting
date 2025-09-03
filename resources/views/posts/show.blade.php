@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-2xl rounded-2xl p-10 mb-10 border-t-4 border-indigo-600">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $post->titel }}</h1>
        <p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $post->inhoud }}</p>
        <div class="text-sm text-orange-500 font-medium">
            🗓 Geplaatst op {{ $post->created_at->format('d-m-Y H:i') }}
        </div>
    </div>

    <!-- Reacties -->
    <div class="bg-white shadow-md rounded-2xl p-8 mb-8">
        <h2 class="text-2xl font-bold text-indigo-700 mb-6">💬 Reacties ({{ $post->comments->count() }})</h2>

        @if($post->comments->isEmpty())
            <p class="text-gray-600">Nog geen reacties.</p>
        @else
            <div class="space-y-6">
                @foreach ($post->comments as $comment)
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl">
                        <p class="text-gray-900 font-semibold">{{ $comment->naam }}</p>
                        <p class="text-gray-700">{{ $comment->reactie }}</p>
                        <p class="text-sm text-gray-500 mt-2">📅 {{ $comment->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Reactie formulier -->
    <div class="bg-white shadow-md rounded-2xl p-8">
        <h3 class="text-xl font-bold text-indigo-700 mb-4">📝 Laat een reactie achter</h3>

        <form action="{{ url('/comments') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div>
                <label for="naam" class="block text-sm font-semibold text-gray-700">Naam</label>
                <input type="text" name="naam" id="naam" 
                       class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                       required>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" 
                       class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                       required>
            </div>

            <div>
                <label for="reactie" class="block text-sm font-semibold text-gray-700">Reactie</label>
                <textarea name="reactie" id="reactie" rows="4" 
                          class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                          required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow-md font-semibold">
                    Reactie plaatsen
                </button>
            </div>
        </form>
    </div>
@endsection
