<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nama_tag', 'slug', 'deskripsi'];

    public function post()
    {
    	return $this->belongsToMany('App\Post', 'tag_posts');
    }
}
