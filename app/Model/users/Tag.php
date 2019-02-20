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

    public function posts()
    {
    	return $this->belongsToMany('App\Model\user\post','post_tags')->orderBy('created_at','DESC')->paginate(5);
    }
    public static function getRouteKeyName()
    {
    	return 'slug';
    }
    public static function getTagById($id){
        $tag = self::findOrFail($id);
        return  !empty($tag) ? $tag : 'Failed to locate tag';
    }

}
