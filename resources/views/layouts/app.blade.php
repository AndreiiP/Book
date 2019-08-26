<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/app.js') }}" ></script>

</head>
<body>

<div id="app">
    <div class="wrapper">
        @include('layouts.header')
        <div class="content-wrapper wrap-books">
            <section class="content-header">
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
</div>

</body>
</html>
