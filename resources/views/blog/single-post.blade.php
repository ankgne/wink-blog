@extends('layouts.master')
@section('content')

        <!-- posts column -->
<div class="column is-centered is-8-desktop is-8-tablet is-10-mobile">
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

    <!-- featured-posts -->
    <div class="featured-posts small">
        <div class="columns">
            <div class="column is-12">
                <div class="header-content">
                    <h1 class="title is-4">Related Posts</h1>
                </div>
            </div>
        </div>


        <div class="columns">
            @foreach($related_posts as $related_post)
                <div class="column is-3 col-6">
                    <div class="post post-thumb">
                        <a href="{{route('single.blog.show',[$related_post->slug])}}" class="post-img">
                            <img src="{{$related_post->featured_image}}" alt="">
                        </a>
                        <div class="post-body">
                            <h3 class="post-title">
                                <a href="{{route('single.blog.show',[$post->slug])}}">
                                    {{$related_post->title}}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

    </div>
    <!-- end featured-posts -->
    <hr/>
    @include('layouts.comments')
</div>
<!--  end of post column -->


@endsection