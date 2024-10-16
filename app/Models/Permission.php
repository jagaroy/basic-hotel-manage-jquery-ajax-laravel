<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    protected $primaryKey = 'permi_id';

    protected $fillable = ['role_id', 'permi_module', 'permi_desc', 'created_by', 'updated_by'];
}
