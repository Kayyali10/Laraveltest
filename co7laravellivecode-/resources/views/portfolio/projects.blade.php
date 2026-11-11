@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h2>My Latest Work</h2>
    <button><a href="{{ route('projects.create') }}">Add New Project</a></button>
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        @foreach($projects as $project)
            <div style="border: 1px solid #ccc; padding: 15px;">
                <h3>{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                <small>Status: {{ $project->status }}</small>
                <button><a href="{{ route('projects.edit', $project->id) }}">Edit</a></button>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
            </div>
        @endforeach
    </div>
@endsection