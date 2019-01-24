@extends('layouts.master')
@section('content')

        <!-- posts column -->
<div class="column is-8 is-centered is-8-desktop is-8-tablet is-10-mobile">
    <!-- start of post -->

    <div class="header-content">

        <h1 class="title is-4">
            {{$post->title}}
        </h1>

        <small>
            <i>Posted in
                @foreach($post->tags as $tag)
                    {{--A post can have multiple tags--}}
                    @if (!$loop->first)
                        {{--do not add comma if its a first iteration of the loop--}}
                        ,
                    @endif
                    <a href="{{ route('blog.tag.index', $tag->slug) }}">{{$tag->name}}</a>
                @endforeach
                {{$post->publish_date->format('j M Y')}}
            </i>
        </small>

    </div>

    <div class="columns is-centered">
        <div class="column is-8">
            <figure class="image is-16by9">
                <img src="{{$post->featured_image}}">
            </figure>
        </div>
    </div>


    <div class="content">
        {!! $post->body !!}
        <div class="content-footer">
            <hr/>
            <p><a class="button menu-label" href="{{route('blog.home')}}">Back to Home</a></p>
        </div>
    </div>


    <!-- end of post -->
    @include('layouts.comments')
</div>
<!--  end of post column -->


@endsection