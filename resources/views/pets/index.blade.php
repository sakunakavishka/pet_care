@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Your Pets</h1>
    <a href="{{ route('pet.create') }}" class="btn btn-primary mb-3">Add New Pet</a>

    @if($pets->isEmpty())
        <p>No pets found. Start by adding a new pet.</p>
    @else
        <div class="row">
            @foreach($pets as $pet)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($pet->featured_image)
                        <img src="/storage/{{ $pet->featured_image }}" class="card-img-top" alt="{{ $pet->name }}" height="300">

                            {{-- <img src="{{ asset('storage/' . $pet->featured_image) }}" class="card-img-top" alt="{{ $pet->name }}"> version problam--}}
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $pet->name }}</h5>
                            <p class="card-text">
                                <strong>Breed:</strong> {{ $pet->breed }} <br>
                                <strong>Age:</strong> {{ $pet->age }} years <br>
                                <strong>Weight:</strong> {{ $pet->weight }} kg
                            </p>
                            @if($pet->gallery_images)
                <p><strong>Gallery Images:</strong></p>
                <div class="gallery">
                    @foreach(json_decode($pet->gallery_images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                    @endforeach
                </div>
            @endif
            <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('pet.destroy', $pet->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
                            {{-- <a href="{{ route('pet.show', $pet->id) }}" class="btn btn-info">View Details</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
