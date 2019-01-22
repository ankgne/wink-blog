<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class blogController extends Controller
{
    public function index($pageNum = 1)
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(config('blog.paginationCount'), ['*'], 'page', $pageNum);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function showSinglePost($slug)
    {
        $post = WinkPost::where('slug', 'like', $slug)->first();

        return view('blog.single-post', [
            'post' => $post,
        ]);
    }

    public function tagPageIndex($tagSlug, $pageNum = 1)
    {
        $posts = WinkPost::whereHas('tags', function ($query) use ($tagSlug) {
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
