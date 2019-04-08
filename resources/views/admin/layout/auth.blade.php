<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BlackStore - Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layout.includes.styles')
</head>
<body class="sidebar-mini login-page">
    @yield('content')
    @yield('script')
</body>
</html>
