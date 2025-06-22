@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Event</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/events') }}">
        @csrf
        <div class="mb-3">
            <label>Title *</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Date *</label>
            <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
        </div>

        <div class="mb-3">
            <label>Time</label>
            <input type="time" name="time" class="form-control" value="{{ old('time') }}">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <button class="btn btn-success" type="submit">Create Event</button>
        <a href="{{ url('/admin/events') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
