<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public $timestamps = true;

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
