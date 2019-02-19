<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;
use App\BlogPost;


class blogController extends Controller
{
    public function index($pageNum = 1)
    {
        $posts = BlogPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->withCount('views')//get the count of views in views_count column
            ->simplePaginate(config('blog.paginationCount'), ['*'], 'page', $pageNum);

        $popular_posts = filterPopularPosts($posts,5);

        $featured_posts=BlogPost::FeaturedPosts()->get();

        return view('blog.index', [
            'posts' => $posts,
            'popular_posts' => $popular_posts,
            'featured_posts' => $featured_posts
        ]);
    }

    //we are getting the post details based on slug and it's configured in BlogPost
    public function showSinglePost(BlogPost $post)
    {
        //recording the view count of the post
        views($post)->record();

        return view('blog.single-post', [
            'post' => $post,
        ]);
    }

    public function tagPageIndex($tagSlug, $pageNum = 1)
    {
        $posts = BlogPost::whereHas('tags', function ($query) use ($tagSlug) {
            $query->where('slug', 'like', $tagSlug);
        })
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(config('blog.paginationCount'), ['*'], 'page', $pageNum);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

}
