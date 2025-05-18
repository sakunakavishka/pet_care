@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Create Schedule</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pet_id" class="form-label">Pet</label>
            <select name="pet_id" id="pet_id" class="form-select" required>
                <option value="">Select a pet</option>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="">Select a type</option>
                <option value="feeding">Feeding</option>
                <option value="grooming">Grooming</option>
                <option value="training">Training</option>
                <option value="vet_visit">Vet Visit</option>
            </select>
        </div>

        <div id="supply-fields" style="display: none;">
            <div class="mb-3">
                <label for="supply_id" class="form-label">Supply</label>
                <select name="supply_id" id="supply_id" class="form-select">
                    <option value="">Select a supply</option>
                    @foreach ($supplies as $supply)
                    <option value="{{ $supply->id }}">{{ $supply->pet->name }} {{ $supply->item_name }} ({{ $supply->quantity }} {{ $supply->unit }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount (grams)</label>
                <input type="number" name="amount" id="amount" class="form-control" min="1">
            </div>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Schedule</button>
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
