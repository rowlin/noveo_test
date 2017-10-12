<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'state'
    ];

    /*
     * use many to many re
     */

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }

}
