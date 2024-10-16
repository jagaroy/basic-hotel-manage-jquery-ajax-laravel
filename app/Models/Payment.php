<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = ["id","booking_id","payment_amount","payment_method","payment_time","payment_remarks","authored_by"];
    
	public function bookings_relation()
	{
		return $this->belongsTo(\App\Models\Booking::class, "booking_id");
	}

}
