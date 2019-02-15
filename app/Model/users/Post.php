<?php

namespace App\Model\users;

use Illuminate\Database\Eloquent\Model;
use Request;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'body',
        'image',
        'posted_by'
    ];

    public function uploadImg($field)
    {
    
        // Option one for uploading images
        if (Request::hasFile($field)) {
            // get filename with extention
            $filenameWithExt = Request::file($field)->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = Request::file($field)->getClientOriginalExtension();
            // filename to store
            $filenNameToStore = $filename.'_'. time().'.'.$extension;
            // upload the image
            $path  = Request::file($field)->storeAs('public/cover_images', $filenNameToStore);
            
            return $filenNameToStore;
        }


        // option two for uploading images
        // if (Request::hasfile($field)) {
        //     $pic = Request::file($field);
        //     if ($pic->isValid()) {
        //         $newName = md5(1, 1000) . $pic->getClientOriginalName(). '.' .$pic->getClientOriginalExtension(); 
        //         $pic->storeAs('public/cover_images', $newName);
        //         return $newName;
        //     }
        // }


        return 'no_image.jpg';
    }
}
