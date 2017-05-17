<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_post extends Model
{
    protected $fillable = ['tag_id', 'post_id'];
}
