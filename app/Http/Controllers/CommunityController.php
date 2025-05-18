<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::with('user')->latest()->paginate(10); // Fetch posts with user data
        return view('community.index', compact('communities'));
    }

    public function front()
    {
        $communities = Community::with('user')->latest()->paginate(10); // Fetch posts with user data
        return view('frontend.community', compact('communities'));
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('community.create');
    }

    // Store a newly created post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_type' => 'required|in:question,photo,event',
            'content' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'question' => 'nullable|string',
        ]);

        // Handle photo uploads
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('community/photos', 'public');
            }
        }

        Community::create([
            'user_id' => Auth::id(),
            'post_type' => $validated['post_type'],
            'content' => $validated['content'] ?? null,
            'photos' => $photos,
            'question' => $validated['question'] ?? null,
        ]);

        return redirect()->route('community.index')->with('success', 'Post created successfully.');
    }

    // Show the form for editing a post
    public function edit($id)
    {
        $community = Community::findOrFail($id);
        return view('community.edit', compact('community'));
    }

    // Update the specified post
    public function update(Request $request, $id)
    {
        $community = Community::findOrFail($id);

        if ($community->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'post_type' => 'required|in:question,photo,event',
            'content' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'question' => 'nullable|string',
        ]);

        // Handle photo uploads
        $photos = $community->photos ?? [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('community/photos', 'public');
            }
        }

        $community->update([
            'post_type' => $validated['post_type'],
            'content' => $validated['content'] ?? null,
            'photos' => $photos,
            'question' => $validated['question'] ?? null,
        ]);

        return redirect()->route('community.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified post
    public function destroy($id)
    {
        $community = Community::findOrFail($id);
        if ($community->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $community->delete();

        return redirect()->route('community.index')->with('success', 'Post deleted successfully.');
    }
}
