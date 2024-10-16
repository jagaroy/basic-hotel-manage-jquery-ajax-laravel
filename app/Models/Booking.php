<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = ["id","room_id","customer_id","booking_date","check_in_time","check_out_time","booking_status","booking_remarks","authored_by"];
    
	public function rooms_relation()
	{
		return $this->belongsTo(\App\Models\Room::class, "room_id");
	}
	public function customers_relation()
	{
		return $this->belongsTo(\App\Models\Customer::class, "customer_id");
	}

}
