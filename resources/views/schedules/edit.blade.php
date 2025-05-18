@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Edit Schedule</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pet_id" class="form-label">Pet</label>
            <select name="pet_id" id="pet_id" class="form-select" required>
                <option value="">Select a pet</option>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $schedule->pet_id == $pet->id ? 'selected' : '' }}>
                        {{ $pet->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="feeding" {{ $schedule->type == 'feeding' ? 'selected' : '' }}>Feeding</option>
                <option value="grooming" {{ $schedule->type == 'grooming' ? 'selected' : '' }}>Grooming</option>
                <option value="training" {{ $schedule->type == 'training' ? 'selected' : '' }}>Training</option>
                <option value="vet_visit" {{ $schedule->type == 'vet_visit' ? 'selected' : '' }}>Vet Visit</option>
            </select>
        </div>

        <div id="supply-fields" style="{{ $schedule->type == 'feeding' ? '' : 'display: none;' }}">
            <div class="mb-3">
                <label for="supply_id" class="form-label">Supply</label>
                <select name="supply_id" id="supply_id" class="form-select">
                    <option value="">Select a supply</option>
                    @foreach ($supplies as $supply)
                        <option value="{{ $supply->id }}" {{ $schedule->supply_id == $supply->id ? 'selected' : '' }}>
                            {{ $supply->pet->name }} {{ $supply->item_name }} ({{ $supply->quantity }} {{ $supply->unit }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount (grams)</label>
                <input type="number" name="amount" id="amount" class="form-control" min="1" value="{{ $schedule->amount }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $schedule->date }}" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ $schedule->time }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending" {{ $schedule->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $schedule->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
</div>

<script>
    document.getElementById('type').addEventListener('change', function () {
        const supplyFields = document.getElementById('supply-fields');
        if (this.value === 'feeding') {
            supplyFields.style.display = 'block';
        } else {
            supplyFields.style.display = 'none';
            document.getElementById('supply_id').value = '';
            document.getElementById('amount').value = '';
        }
    });
</script>
@endsection
