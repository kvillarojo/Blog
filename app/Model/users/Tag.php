<?php

namespace App\Model\users;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = [
        'slug',
        'name' 
    ];

    
    public function post_tag()
    {
        return $this->hasMany('App\Model\users\post_tag', 'tag_id');
    }

    public static function getTagById($id){
        $tag = self::findOrFail($id);
        return  !empty($tag) ? $tag : 'Failed to locate tag';
    }

}
