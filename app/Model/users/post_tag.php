<?php

namespace App\Model\post_tag;

use App\Model\users\Post;
use App\Model\users\Tag;
use Illuminate\Database\Eloquent\Model;

class post_tag extends Model
{
    
    protected $table ="post_tags";

    protected $fillable = [ 
        'post_id',
        'tag_id'
    ];

    public static function post()
    {
        return $this->belongsTo('Post');
    }

    public static function tags()
    {
        return $this->belongsTo('Tag');
    }
}
