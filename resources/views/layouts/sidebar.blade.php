<!-- sidebar -->
<div class="sidebar">
    <div class="columns">
        <div class="column is-12">
            <div class="header-content">
                <h1 class="title is-4">Popular Posts</h1>
            </div>
            <ul class="last-posts">
                @foreach($popular_posts as $popular_post)
                    <li class="last-posts-item">
                        <a href="{{route('single.blog.show',[$popular_post->slug])}}" class="post-img">
                            <img src="{{$popular_post->featured_image}}" alt="">
                        </a>

                        <div class="post-body">
                            <small>
                                <i>
                                    @foreach($popular_post->tags as $tag)
                                        {{--A post can have multiple tags--}}
                                        @if (!$loop->first)
                                            {{--do not add comma if its a first iteration of the loop--}}
                                            ,
                                        @endif
                                        <a href="{{ route('blog.tag.index', $tag->slug) }}">{{$tag->name}}</a>
                                    @endforeach
                                </i>
                                <h3 class="post-title">
                                    <a href="{{route('single.blog.show',[$popular_post->slug])}}">
                                        {{$popular_post->title}}
                                    </a>
                                </h3>
                            </small>

                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>