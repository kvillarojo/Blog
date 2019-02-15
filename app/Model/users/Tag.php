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

}
