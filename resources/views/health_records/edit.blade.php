@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Edit Health Record</h1>
    <form action="{{ route('health_records.update', $healthRecord->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pet_id" class="form-label">Select Pet</label>
            <select name="pet_id" id="pet_id" class="form-control" disabled>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $pet->id == $healthRecord->pet_id ? 'selected' : '' }}>
                        {{ $pet->name }}
                    </option>
                @endforeach
            </select>
            @error('pet_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="record_type" class="form-label">Record Type</label>
            <select name="record_type" id="record_type" class="form-control" required>
                <option value="vaccination" {{ $healthRecord->record_type == 'vaccination' ? 'selected' : '' }}>Vaccination</option>
                <option value="medication" {{ $healthRecord->record_type == 'medication' ? 'selected' : '' }}>Medication</option>
                <option value="checkup" {{ $healthRecord->record_type == 'checkup' ? 'selected' : '' }}>Checkup</option>
            </select>
            @error('record_type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $healthRecord->description }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $healthRecord->date }}" required>
            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="document" class="form-label">Replace Document (Optional)</label>
            <input type="file" name="document" id="document" class="form-control" accept=".pdf,.doc,.docx">
            @if ($healthRecord->document)
                <p>Current Document: <a href="{{ Storage::url($healthRecord->document) }}" target="_blank">View Document</a></p>
            @endif
            @error('document') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Replace Photo (Optional)</label>
            <input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.png,.jpeg">
            @if ($healthRecord->photo)
                <p>Current Photo:</p>
                <img src="{{ Storage::url($healthRecord->photo) }}" alt="Photo" width="100">
            @endif
            @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Record</button>
        <a href="{{ route('health_records.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
