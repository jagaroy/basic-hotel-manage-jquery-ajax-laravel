<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemType extends Model
{
    protected $table = 'itemtypes';

    protected $fillable = ["id","item_type","item_type_remarks","authored_by"];
    

}
