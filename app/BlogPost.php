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
}
