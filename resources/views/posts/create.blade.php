@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-2xl mx-auto border-t-4 border-indigo-600">
        <h1 class="text-3xl font-bold mb-8 text-indigo-700">✍️ Nieuwe Blogpost</h1>

        <form action="{{ url('/posts') }}" method="POST" class="space-y-8">
            @csrf
            <div>
                <label for="titel" class="block text-sm font-semibold text-gray-700">Titel</label>
                <input type="text" name="titel" id="titel" 
                       class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                       required>
            </div>

            <div>
                <label for="inhoud" class="block text-sm font-semibold text-gray-700">Inhoud</label>
                <textarea name="inhoud" id="inhoud" rows="6" 
                          class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                          required></textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ url('/posts') }}" class="px-5 py-2 rounded-lg text-gray-600 hover:text-gray-900">
                    Annuleren
                </a>
                <button type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow-md font-semibold">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
@endsection
