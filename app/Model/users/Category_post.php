<?php

namespace App\Model\Category_post;

use App\Model\users\Post;
use App\Model\users\categories;
use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    protected $table = "category_posts";
    
    protected $fillable = [
        'post_id',
        'category_id'
    ];

    public static function post()
    {
        return $this->belongsTo('Post', 'id', 'post_id');
    }

    public static function category()
    {
        return $this->belongsTo('categories', 'id', 'category_id');
    }
}
