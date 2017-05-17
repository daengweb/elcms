<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
	use Searchable;
    protected $fillable = ['judul', 'slug', 'isi', 'gambar', 'meta_keyword', 'meta_description', 'is_publish', 'dilihat', 'user_id'];
    protected $dates = ['created_at'];
    public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function searchableAs()
    {
        return 'posts_index';
    }

    public function kategori()
	{
	    return $this->belongsToMany('App\Kategori', 'kategori_posts');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tag()
	{
		return $this->belongsToMany('App\Tag', 'tag_posts');
	}
}
