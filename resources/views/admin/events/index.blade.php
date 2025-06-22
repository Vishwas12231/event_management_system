@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Events</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ url('/admin/events/create') }}" class="btn btn-primary mb-3">Add New Event</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->time ?? '-' }}</td>
                    <td>{{ $event->location ?? '-' }}</td>
                    <td>
                        <a href="{{ url('/admin/events/' . $event->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ url('/admin/events/' . $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No events found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
