<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wink\WinkPost;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class BlogPost extends WinkPost implements ViewableContract
{
    use Viewable;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to get 3 featured posts based on the tag attached to it
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeaturedPosts($query)
    {
        return $query->whereHas('tags' , function ($query)  {
            $query->where('slug','like','featured')->limit(3);
        });
    }

}
