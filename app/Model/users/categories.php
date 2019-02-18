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
