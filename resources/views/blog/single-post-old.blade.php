@extends('layouts.master')
@section('content')

        <!-- posts column -->
<div class="column is-8 is-offset-1 is-centered">
    <!-- start of post -->
    <div class="header-content">
        <figure class="image is-128x128">
            <img src="{{$post->featured_image}}">
        </figure>


        <h1 class="title is-4">
            {{$post->title}}
        </h1>
        <small><i>Posted in <a href="category.html">Web Design</a> on <a href="category.html">{{$post->publish_date->format('j M Y - h:i A')}}</a> by <a
                        href="category.html">{{$post->author->name}}</a></i></small>
    </div>
    <div class="content">
        {!! $post->body !!}
        <div class="content-footer">
            <hr/>
            <p><a class="button menu-label" href="{{route('blog.home')}}">Back to Home</a></p>
        </div>
    </div>
    <!-- end of post -->
</div>
<!--  end of post column -->


@endsection