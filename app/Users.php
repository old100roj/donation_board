<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /** @var array */
    protected $fillable = [
      'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    /** @var bool */
    public $timestamps = false;
}
