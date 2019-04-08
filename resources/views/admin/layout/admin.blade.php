<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BlackStore</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layout.includes.styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @yield('modal')
        @include('admin.layout.includes.header')
        @include('admin.layout.includes.left')
        <div class="main-content content-wrapper main-content--default">
            @include('admin.layout.includes.nav')
                @yield('content')
        </div>
        @include('admin.layout.includes.scripts')
    </div>
</body>
</html>
