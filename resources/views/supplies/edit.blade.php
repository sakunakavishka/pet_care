@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Edit Supply</h1>
    <form action="{{ route('supplies.update', $supply->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pet_id" class="form-label">Pet</label>
            <select name="pet_id" id="pet_id" class="form-select">
                <option value="">-- Select Pet --</option>
                @if($pets && $pets->count())
                    @foreach($pets as $pet)
                        <option value="{{ $pet->id }}" {{ $supply->pet_id == $pet->id ? 'selected' : '' }}>
                            {{ $pet->name }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled>No pets available</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" name="item_name" id="item_name" class="form-control" value="{{ old('item_name', $supply->item_name) }}">
            @error('item_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $supply->quantity) }}">
            @error('quantity') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="kg" readonly>
            @error('unit') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="low_stock_threshold" class="form-label">Low Stock Threshold</label>
            <input type="number" name="low_stock_threshold" id="low_stock_threshold" class="form-control" value="{{ old('low_stock_threshold', $supply->low_stock_threshold) }}">
            @error('low_stock_threshold') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Supply</button>
        <a href="{{ route('supplies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
