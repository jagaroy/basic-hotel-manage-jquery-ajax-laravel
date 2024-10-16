<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{
    protected $table = 'roomtypes';

    protected $fillable = ["id","room_type","room_type_image","room_type_desc","room_type_status","room_type_remarks","authored_by"];
    

}
