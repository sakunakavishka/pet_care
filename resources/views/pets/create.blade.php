@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Add New Pet</h1>
    <form action="{{ route('pet.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label for="featured_image" class="form-label">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="form-control" accept="image/*">
            <div class="mt-3">
                <img id="image_preview" 
                     src="" 
                     alt="Image Preview" 
                     class="rounded-square d-none" 
                     style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #ddd;">
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="breed" class="form-label">Breed</label>
            <input type="text" name="breed" id="breed" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age (Years)</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="number" name="weight" id="weight" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="images" class="form-label">Gallery Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            <div class="mt-3 d-flex flex-wrap gap-3" id="gallery_previews"></div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
