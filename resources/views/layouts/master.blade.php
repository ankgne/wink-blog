<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ankur Khurana blog</title>

    <link rel="stylesheet" href="/css/app.css" type="text/css">

</head>

<body>
{{--@include('layouts.nav')--}}
<div class="main-content">
    <div class="container ">
        <div class="columns is-multiline is-mobile is-centered">
            @include('layouts.navbar')
            {{--@include('layouts.flash')--}}
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
</div>

<script src="/js/app.js"></script>

</body>
</html>