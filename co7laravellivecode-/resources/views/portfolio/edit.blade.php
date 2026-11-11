
@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <h1>Edit Your Profile</h1>
    <p>Update your personal information and professional skills.</p>

    <form action="{{ route('profile.update') }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name">Full Name:</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                placeholder="Enter your full name"
                required
                maxlength="255"
            >

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <!-- Job Title -->
        <div>
            <label for="job_title">Job Title:</label>

            <input
                type="text"
                id="job_title"
                name="job_title"
                value="{{ old('job_title', $user->job_title) }}"
                placeholder="e.g. Full-Stack Developer"
                maxlength="255"
            >

            @error('job_title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

<!-- Skills -->
<div>
    <label>Technical Skills:</label>

    @foreach($user->skills as $skill)
        <div>
            <input
                type="text"
                name="skills[]"
                value="{{ $skill->name }}"
                placeholder="Enter skill"
            >
        </div>
    @endforeach

    <div>
        <input
            type="text"
            name="skills[]"
            placeholder="Add a new skill"
        >
    </div>

    @error('skills')
        <p>{{ $message }}</p>
    @enderror

    @error('skills.*')
        <p>{{ $message }}</p>
    @enderror
</div>


        <br>

        <!-- Buttons -->
        <button type="submit">Update Profile</button>

        <a href="{{ route('home') }}">Cancel</a>

    </form>

@endsection
