<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ankur Khurana's Blog</title>
    <?php
        if(!$post->excerpt)
            $postExcerpt = str_limit($post->body,200);
        else
            $postExcerpt = str_limit($post->excerpt );
    ?>
    @if(Request::routeis('blog.home'))
        <meta name="twitter:title" content="Ankur Khurana's Blog">
        <meta name="og:title" content="Ankur Khurana's Blog">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:description" content="Blog for sharing my experience">
        <meta name="twitter:site" content="@ankgne">
        <meta name="twitter:image" content="https://s.gravatar.com/avatar/59a97a8e0cfc1f33bd0cf916e29a586d?s=80">
        <meta name="og:site_name" content="{{ config('blog.title') }}">
        <meta name="og:image" content="https://s.gravatar.com/avatar/59a97a8e0cfc1f33bd0cf916e29a586d?s=80">
    @else
        <meta name="twitter:title" content="{{$post->title}}">
        <meta name="og:title" content="{{$post->title}}">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:description" content="{!! $postExcerpt !!}">
        <meta name="twitter:site" content="@ankgne">
        <meta name="twitter:image" content="{{$post->featured_image}}">
        <meta name="og:site_name" content="{{ config('blog.title') }}">
        <meta name="og:image" content="{{$post->featured_image}}">
    @endif
    <meta name="og:type" content="website">
        <meta name="og:locale" content="en_US">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css" type="text/css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133168440-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-133168440-1');
    </script>

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