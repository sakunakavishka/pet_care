@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Edit Pet</h1>
    <form action="{{ route('pet.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="featured_image" class="form-label">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="form-control" accept="image/*">
            @if($pet->featured_image)
            <div class="mt-3">
                <img src="/storage/{{ $pet->featured_image }}" 
                     alt="Current Image" 
                     class="rounded-square" 
                     style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #ddd;">
            </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $pet->name }}" required>
        </div>
        <div class="mb-3">
            <label for="breed" class="form-label">Breed</label>
            <input type="text" name="breed" id="breed" class="form-control" value="{{ $pet->breed }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age (Years)</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $pet->age }}" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="number" name="weight" id="weight" class="form-control" value="{{ $pet->weight }}" required>
        </div>
        <div class="mb-4">
            <label for="images" class="form-label">Gallery Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            @if($pet->gallery_images)
            <div class="mt-3 d-flex flex-wrap gap-3">
                @foreach(json_decode($pet->gallery_images) as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                @endforeach
            </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
