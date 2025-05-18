@extends('layouts.user')

@section('content')
    <div class="content">
        <h1>Edit Post</h1>
        <form action="{{ route('community.update', $community->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="post_type" class="form-label">Post Type</label>
                <select name="post_type" id="post_type" class="form-select" required>
                    <option value="question" {{ $community->post_type === 'question' ? 'selected' : '' }}>Question</option>
                    <option value="photo" {{ $community->post_type === 'photo' ? 'selected' : '' }}>Photo</option>
                    <option value="event" {{ $community->post_type === 'event' ? 'selected' : '' }}>Event</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Question (if applicable)</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ $community->question }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" rows="4" class="form-control">{{ $community->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="photos" class="form-label">Photos</label>
                <input type="file" name="photos[]" id="photos" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
