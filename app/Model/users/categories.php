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
    
}
