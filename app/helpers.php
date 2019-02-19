<?php
//check if provided tag is present as one of the tags in post//

if (! function_exists('isTag')) {
    function isTag($tagCollection, $needle)
    {
        return ($tagCollection->search(function ($tag) use ($needle) {
            return $tag->slug == $needle;
        }));
    }
}

//check if featured is present as one of the tags in post//
if (! function_exists('isFeatured')) {
    function isFeatured($tagCollection)
    {
        return isTag($tagCollection,'featured');
    }
}

//get popular posts based on view count
if (! function_exists('filterPopularPosts')) {
    function filterPopularPosts($posts, $countOfPosts)
    {
        return $posts->sortByDesc('views_count')->slice(0,$countOfPosts);
    }
}