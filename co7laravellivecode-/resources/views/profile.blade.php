<!DOCTYPE html>
<html>
<head>
    <title>بطاقة المطور</title>
</head>
<body style="font-family: Tahoma, sans-serif; text-align: center; padding: 50px;">

    <div style="border: 2px solid #ff7900; padding: 20px; border-radius: 10px; display: inline-block;">
        <h2>أهلاً بك يا {{ $developerName }} 👋</h2>
        <h3>مسارك البرمجي هو: {{ $developerTrack }}</h3>

        <hr>

        {{-- التحدي الإضافي باستخدام الجمل الشرطية --}}
        @if(strtolower($developerTrack) == 'laravel')
            <p style="color: green; font-weight: bold;">أنت في طريقك لتصبح بطل الـ Backend! 🦸‍♂️</p>
        @else
            <p style="color: blue;">تخصص رائع، استمر في إبداعك!</p>
        @endif
    </div>

</body>
</html>