<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::latest()->get();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('images.index')->with('success', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $request->validate(['title' => 'required']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image->update(['title' => $request->title, 'image' => $imagePath]);
        } else {
            $image->update(['title' => $request->title]);
        }

        return redirect()->route('images.index')->with('success', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->image);

        $image->delete();

        return redirect()->route('images.index')->with('success', 'Image deleted successfully');
    }
}
