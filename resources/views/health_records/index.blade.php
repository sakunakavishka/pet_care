@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Health Records</h1>
    <a href="{{ route('health_records.create') }}" class="btn btn-primary">Add New Record</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Pet Name</th>
                <th>Record Type</th>
                <th>Description</th>
                <th>Date</th>
                <th>Document</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($healthRecords as $record)
                <tr>
                    <td>{{ $record->pet->name }}</td>
                    <td>{{ ucfirst($record->record_type) }}</td>
                    <td>{{ $record->description }}</td>
                    <td>{{ $record->date }}</td>
                    <td>
                        @if ($record->document)
                            <a href="{{ Storage::url($record->document) }}" target="_blank">View Document</a>
                        @endif
                    </td>
                    <td>
                        @if ($record->photo)
                            <img src="{{ Storage::url($record->photo) }}" alt="Photo" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('health_records.edit', $record->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('health_records.destroy', $record->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
