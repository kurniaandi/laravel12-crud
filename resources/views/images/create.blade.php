@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-2xl font-bold mb-4">Upload Image</h2>

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            <input type="file" name="image" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
    </form>
</div>
@endsection
