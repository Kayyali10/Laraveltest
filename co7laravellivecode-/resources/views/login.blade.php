<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>  

    <div class="login-container">

        <h1>Welcome Back</h1>
        <p>Please login to your account</p>

        @if ($errors->any())
            <div class="errors">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error}}</p>
                    @endforeach
                
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            <!-- وظيفته حماية النماذج من نوع معين من الهجمات التي تحاول إرسال طلبات غير مصرح بها باسم المستخدم. -->
            @csrf
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>

    </div>

    
</body>
</html>