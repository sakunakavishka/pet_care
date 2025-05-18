@extends('layouts.user')

@section('content')
    <div class="content">
        <h1>Edit Comment</h1>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control" required>{{ $comment->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Comment</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
@endsection
