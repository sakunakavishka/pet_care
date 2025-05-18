@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Add Health Record</h1>
    <form action="{{ route('health_records.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="pet_id" class="form-label">Select Pet</label>
            <select name="pet_id" id="pet_id" class="form-control" required>
                <option value="" disabled selected>Select your pet</option>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                @endforeach
            </select>
            @error('pet_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="record_type" class="form-label">Record Type</label>
            <select name="record_type" id="record_type" class="form-control" required>
                <option value="" disabled selected>Select record type</option>
                <option value="vaccination">Vaccination</option>
                <option value="medication">Medication</option>
                <option value="checkup">Checkup</option>
            </select>
            @error('record_type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="document" class="form-label">Upload Document (Optional)</label>
            <input type="file" name="document" id="document" class="form-control" accept=".pdf,.doc,.docx">
            @error('document') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Upload Photo (Optional)</label>
            <input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.png,.jpeg">
            @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Record</button>
        <a href="{{ route('health_records.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
