<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    public static function boot() {
        parent::boot();

        // Delete the Photo from the public directory
        static::deleting(function($photo) { // before delete() method call this
            $fullPath = public_path() . $photo->path;
            if(file_exists($fullPath))
            {
                unlink($fullPath);
            }
             // do the rest of the cleanup...
        });
    }

    static $imagesFolder = '/images/';
    protected $defaultProfilePhoto = 'contacts-512.png';
    protected $fillable = [
        'path',
    ];

    public function getPathAttribute($value) {
        return self::$imagesFolder . $value;
    }
}
