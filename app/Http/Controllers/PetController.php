<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::where('user_id', Auth::id())->get();
        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $pets = Pet::where('user_id', Auth::id())->get();
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
        'weight' => 'required|numeric|min:0',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $data = $request->only(['name', 'breed', 'age', 'weight']);
    $data['user_id'] = Auth::id();

    // Save the featured image
    if ($request->hasFile('featured_image')) {
        $data['featured_image'] = $request->file('featured_image')->store('pets/featured', 'public');
    }

    // Save gallery images
    $galleryImages = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $galleryImages[] = $image->store('pets/gallery', 'public');
        }
    }
    $data['gallery_images'] = json_encode($galleryImages);

    // Create the Pet record
    Pet::create($data);

    return redirect()->route('pets')->with('success', 'Pet added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pet = Pet::where('user_id', Auth::id())->findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pet = Pet::where('user_id', Auth::id())->findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
        'weight' => 'required|numeric|min:0',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $pet->name = $request->name;
    $pet->breed = $request->breed;
    $pet->age = $request->age;
    $pet->weight = $request->weight;

    // Update the featured image
    if ($request->hasFile('featured_image')) {
        $pet->featured_image = $request->file('featured_image')->store('pets/featured', 'public');
    }

    // Update gallery images
    if ($request->hasFile('images')) {
        $galleryImages = [];
        foreach ($request->file('images') as $image) {
            $galleryImages[] = $image->store('pets/gallery', 'public');
        }
        $pet->gallery_images = json_encode($galleryImages);
    }

    $pet->save();

    return redirect()->route('pets')->with('success', 'Pet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pet = Pet::where('user_id', Auth::id())->findOrFail($id);

        // Delete the pet record
        $pet->delete();
    
        return redirect()->route('pets')->with('success', 'Pet deleted successfully!');
    }
}
