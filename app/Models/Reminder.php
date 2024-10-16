<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    protected $table = 'reminders';

    protected $fillable = ["id","booking_id","reminder_description","reminder_time","reminder_status","remarks","authored_by"];
    
	public function bookings_relation()
	{
		return $this->belongsTo(\App\Models\Booking::class, "booking_id");
	}

}
