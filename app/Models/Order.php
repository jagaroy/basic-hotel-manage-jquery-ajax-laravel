<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ["id","item_id","booking_id","order_item_quantity","order_cost","order_time","order_status","order_remarks","authored_by"];
    
	public function items_relation()
	{
		return $this->belongsTo(\App\Models\Item::class, "item_id");
	}
	public function bookings_relation()
	{
		return $this->belongsTo(\App\Models\Booking::class, "booking_id");
	}

}
