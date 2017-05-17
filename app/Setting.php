<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_title', 'tagline', 'email', 'blog_show_item', 'meta_keyword', 'meta_description', 'google_webmaster', 'bing_webmaster', 'google_analystic', 'pixel_fb'];
}
