<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

    <div class="register-container">

        <h1>Create Account</h1>
        <p>Register to get started</p>

        @if ($errors->any())

            <div class="errors">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            </div>

        @endif

        <form action="{{ route('register.store') }}" method="POST">

            @csrf

            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}">

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">

            <label>Job Title</label>
            <input type="text" name="job_title" placeholder="Enter your job title" value="{{ old('job_title') }}">

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm your password">

            <button type="submit">Register</button>

        </form>

        <p class="login-link">
            Already have an account?
            <a href="/login">Login</a>
        </p>

    </div>

    <!-- value="{{ old('name') }}" -->
    <!-- تساعدنا على الاحتفاظ بالبيانات السابقة عند فشل Validation والعودة إلى الصفحة. -->
</body>

</html>