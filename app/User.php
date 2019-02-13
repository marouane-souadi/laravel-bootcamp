<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            if($user->photo_id) {
                Photo::destroy($user->photo_id);
            }
             // do the rest of the cleanup...
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'role_id', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
      return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo')->withDefault(['path'=>'contacts-512.png']);
    }

    public function isAdmin() {
        return ($this->role->name === 'admin') && ($this->is_active === 1) ? true : false ;
    }

    public function posts() {
      return $this->hasMany('App\Post');
    }
}
