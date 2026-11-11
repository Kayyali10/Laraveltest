@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <h1>Hello, I'm {{ $user->name }}</h1>
    <h2>{{ $user->email }}</h2>

    <h3>My Skills:</h3>
    <ul>
        @foreach($skills as $skill)
            <li>{{ $skill->name }}</li>
        @endforeach
    </ul>
@endsection
    
</body>
</html>
