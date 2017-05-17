<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori', 'slug', 'deskripsi'];

    public function post()
	{
	    return $this->belongsToMany('App\Post', 'kategori_posts');
	}
}
