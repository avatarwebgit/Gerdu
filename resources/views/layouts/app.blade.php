<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پروژه مدیریت کاربران')</title>
    <!-- استفاده از استایل‌های Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <!-- هدر (Header) -->
    <div class="mb-3">
        <h1>@yield('header', 'مدیریت کاربران')</h1>
    </div>

    <!-- محتوای صفحه -->
    <div class="content">
        @yield('content')
    </div>
</div>

<!-- فوتر (Footer) -->
<footer class="text-center mt-5">
    <p>تمامی حقوق محفوظ است &copy; 2024</p>
</footer>
</body>
</html>
