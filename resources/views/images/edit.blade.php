@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-2xl font-bold mb-4">Edit Image</h2>

    <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $image->title }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Current Image</label>
            <img src="{{ asset('storage/'.$image->image) }}" alt="{{ $image->title }}" class="w-full h-auto rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Change Image</label>
            <input type="file" name="image" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
