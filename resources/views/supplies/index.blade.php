@extends('layouts.user')

@section('content')
<div class="content">
    <h1>Supplies</h1>
    <a href="{{ route('supplies.create') }}" class="btn btn-primary mb-3">Add Supply</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($supplies->isEmpty())
        <p>No supplies found. Add a new one!</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pet</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Low Stock Threshold</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplies as $supply)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $supply->pet->name }}</td>
                        <td>{{ $supply->item_name }}</td>
                        <td>{{ $supply->quantity }}</td>
                        <td>{{ $supply->unit }}</td>
                        <td>{{ $supply->low_stock_threshold }}</td>
                        <td>
                            <a href="{{ route('supplies.edit', $supply->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('supplies.destroy', $supply->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
