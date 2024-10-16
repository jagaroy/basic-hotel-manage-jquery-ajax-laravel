<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = ["id","room_type_id","room_number","room_description","room_status","room_remarks","authored_by"];
    
	public function roomtypes_relation()
	{
		return $this->belongsTo(\App\Models\RoomType::class, "room_type_id");
	}

}
