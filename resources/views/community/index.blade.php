@extends('layouts.user')

@section('content')
    <div class="content">
        <h1>Community Posts</h1>
        <a href="{{ route('community.create') }}" class="btn btn-primary">Create New Post</a>
        <hr>

        @foreach ($communities as $community)
            <div class="card my-3">
                <div class="card-body">
                    <h5>{{ $community->user->name }}</h5>
                    <p>Type: {{ ucfirst($community->post_type) }}</p>
                    
                    @if ($community->post_type === 'question')
                        <h6>Question: {{ $community->question }}</h6>
                    @endif
                    
                    <p>{{ $community->content }}</p>
                    
                    @if ($community->photos)
                        @foreach ($community->photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Photo" style="width: 100px;">
                        @endforeach
                    @endif

                    <p class="card-text">
                        <small class="text-muted">
                            Posted by {{ $community->user->name }} on {{ $community->created_at->format('F j, Y, g:i a') }}
                        </small>
                    </p>

                    @if ($community->user_id === Auth::id())
                        <div class="d-flex">
                            <a href="{{ route('community.edit', $community->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                            <form action="{{ route('community.destroy', $community->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endif

                    <!-- Button to Open Comments Modal -->
                    <button type="button" class="btn btn-info btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#commentsModal{{ $community->id }}">
                        View Comments
                    </button>
                </div>
            </div>

            <form action="{{ route('comments.store', $community->id) }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Write your comment here..." required maxlength="1000"></textarea>
                    @error('comment')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Submit Comment</button>
            </form>
            

            <!-- Modal for Comments -->
            <div class="modal fade" id="commentsModal{{ $community->id }}" tabindex="-1" aria-labelledby="commentsModalLabel{{ $community->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="commentsModalLabel{{ $community->id }}">Comments for Post by {{ $community->user->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach ($community->comments as $comment)
                                <div class="mb-3">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <p>{{ $comment->comment }}</p>
                                    @if ($comment->user_id === auth()->id())
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endif
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $communities->links() }}
        </div>
    </div>
@endsection
