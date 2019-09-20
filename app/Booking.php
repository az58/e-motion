<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo(User::class,'user_id');
    }

        public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
