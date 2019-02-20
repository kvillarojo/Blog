<?php

namespace App\Model\post_tag;

use Illuminate\Database\Eloquent\Model;

class post_tag extends Model
{
    
    protected $table ="post_tags";

    protected $fillable = [ 
        'post_id',
        'tag_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Model\users\Post', 'id', 'post_id');
    }

    public function tags()
    {
        return $this->belongsTo('App\Model\users\Tag', 'id', 'tag_id');
    }
}
