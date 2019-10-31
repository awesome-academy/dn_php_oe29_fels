<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @lang('messages.title_app_admin') </title>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" type="text/css">
</head>
<body>
<div class="wrap">
    @include('layouts.components.navbar')
    @include('admin.layouts.components.sidebar')
    @yield('content')
</div>
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
