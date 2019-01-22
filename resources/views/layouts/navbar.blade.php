<div class="column is-narrow">
    <div class="nav-header">
        <h3 class="title is-3">
            <a href="{{ route('blog.home') }}">{{ config('blog.title') }}</a>
        </h3>
        <h4 class="subtitle is-4"><i>{{ config('blog.subTitle') }}</i></h4>
    </div>
    <hr/>
    <!-- navigation -->
    <aside class="menu">
        <p class="menu-label">
            <a href="{{ route('blog.home') }}">Home Page</a>
        </p>

        {{--<p class="menu-label">--}}
            {{--<a href="about.html">About Page</a>--}}
        {{--</p>--}}

        {{--<p class="menu-label">--}}
            {{--<a href="contact.html">Contact Page</a>--}}
        {{--</p>--}}
    </aside>
    <!-- end navigation -->
    <hr/>
    <!-- post categories -->
    {{--<div class="nav-footer has-text-right">--}}
        {{--<p><i><b><a href="category.html">Field</a></b>, <a href="category.html"><b>Category</b></a>, <a--}}
                        {{--href="category.html"><b>Empty</b></a></i></p>--}}
    {{--</div>--}}
    <!-- end post categories -->
</div>