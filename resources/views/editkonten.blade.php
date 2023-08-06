@extends('layouts.admin')
@section('content')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contents as $content)
                                        <tr>
                                            <td>{{ $content->title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($content->description, 50, '...') }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($content->image, 30, '...') }}</td>
                                            <td>
                                            <a href="{{ route('contents.edit', $content->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="font-size: 12px; padding: 5px 10px;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection