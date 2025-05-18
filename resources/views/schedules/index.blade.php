@extends('layouts.user')

@section('content')

<div class="content">
    <h1>Schedules</h1>
    <a href="{{ route('schedule.create') }}" class="btn btn-primary mb-3">Add Schedule</a>

    @if($schedules->isEmpty())
        <p>No schedules available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Pet</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->pet->name }}</td>
                        <td>{{ ucfirst($schedule->type) }}</td>
                        <td>{{ $schedule->date }}</td>
                        <td>{{ $schedule->time }}</td>
                        <td>{{ ucfirst($schedule->status) }}</td>
                        <td>
                            @if($schedule->status === 'pending')
                                <form action="{{ route('schedule.complete', $schedule->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Complete</button>
                                </form>
                            @endif
                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
