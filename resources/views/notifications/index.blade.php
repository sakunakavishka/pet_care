@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Notifications</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @forelse ($notifications as $notification)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $notification->message }}
                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">No notifications found.</li>
        @endforelse
    </ul>
</div>
@endsection
