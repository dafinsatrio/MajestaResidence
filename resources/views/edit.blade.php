@extends('layouts.admin')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2>Edit Content</h2>
                <form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Konten:</label>
                        <input type="text" name="title" id="title" class="border rounded-md py-2 px-3 w-full @error('title') border-red-500 @enderror" value="{{ old('title', $content->title) }}" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                        <textarea name="description" id="description" rows="4" class="border rounded-md py-2 px-3 w-full @error('description') border-red-500 @enderror" required>{{ old('description', $content->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
                        <input type="file" name="image" id="image" class="py-2 @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="/editkonten" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Konten
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection