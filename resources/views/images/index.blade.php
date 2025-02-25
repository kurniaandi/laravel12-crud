@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Laravel 12 - Image Gallery</h1>
    <a href="{{ route('images.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Upload Image</a>
</div>

@if(session('success'))
    <div class="bg-green-200 p-3 mb-4 rounded">{{ session('success') }}</div>
@endif

<div class="grid grid-cols-3 gap-4">
    @foreach ($images as $image)
        <div class="bg-white p-4 shadow rounded">
            <img src="{{ asset('storage/'.$image->image) }}" class="w-full h-40 object-cover rounded mb-2">
            <h2 class="text-lg font-semibold">{{ $image->title }}</h2>
            <div class="flex gap-2 mt-2">
                <a href="{{ route('images.edit', $image->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
