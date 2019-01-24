@extends('layouts.master')
@section('content')
        <!-- posts column -->
<div class="column is-8-desktop is-8-tablet is-10-mobile is-centered">
    @php($postsObject=json_decode($posts->toJson()))
    @foreach($posts as $post)
            <!-- start of post -->
    <div class="post-wrapper columns">
        <div class="column is-2">
            <a href="{{route('single.blog.show',[$post->slug])}}"><img src="{{$post->featured_image}}"></a>

        </div>
        <div class="column is-8">

            <div class="header-content">

                <h1 class="title is-4">
                    <a href="{{route('single.blog.show',[$post->slug])}}">{{$post->title}}</a>

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
                        on {{$post->publish_date->format('j M Y')}}
                    </i>
                </small>

            </div>

            <div class="content">
                @if(!$post->excerpt)
                    {!! str_limit($post->body,200) !!}
                @else
                    {!! $post->excerpt !!}
                @endif
            </div>

            <div class="content-footer">
                <hr/>
                <p><a class="button menu-label" href="{{route('single.blog.show',['slug'=>$post->slug])}}">Continue
                        Reading</a>
                </p>
            </div>
        </div>
    </div>
    <!-- end of post -->
    @endforeach


            <!-- pagination -->
    <div class="pagination-non-style">
        @if( ($postsObject->prev_page_url))
            <a class="button menu-label" href="{{route('post.pagination',[$postsObject->current_page - 1])}}">Previous
                Posts</a>
            @endif
            @if( ($postsObject->next_page_url) )
                    <!-- margin-top exists to stop overlap -->
            <a class="button menu-label" href="{{route('post.pagination',[$postsObject->current_page + 1])}}">Next
                Posts</a>
        @endif
    </div>
    <!-- pagination -->
</div>
<!-- end of posts column -->
@endsection