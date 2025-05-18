<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, $communityId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Create the comment
        Comment::create([
            'community_id' => $communityId,
            'user_id' => Auth::id(),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Edit a comment.
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        // Ensure only the comment's author can edit it
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update a comment in storage.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Ensure only the comment's author can update it
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('community.index')->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove a comment from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (
            $comment->user_id !== Auth::id() &&
            $comment->community->user_id !== Auth::id()
        ) {
            abort(403, 'Unauthorized action.');
        }
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
    

}
