<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ["id","item_type","item_name","item_cost","item_details","item_status","item_remarks","authored_by"];
    
	public function itemtypes_relation()
	{
		return $this->belongsTo(\App\Models\ItemType::class, "item_type");
	}

}
