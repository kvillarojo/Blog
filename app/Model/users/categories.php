<?php

namespace App\Model\users;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 
        'slug'
    ];

    public function posts()
    {
    	return $this->belongsToMany('App\Model\user\post','category_posts')->orderBy('created_at','DESC')->paginate(5);
    }

    public static function getRouteKeyName()
    {
    	return 'slug';
    }

    public static function getCategories()
    {
        return self::all();
    }

    public static function getCategoryById($id)
    {      
        $category = self::find($id);
        return $category;
        
    }
    
}
