<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /** @var array */
    protected $fillable = [
        'name', 'email', 'donation_amount', 'message', 'created_at'
    ];

    /** @var bool */
    public $timestamps = true;
}
