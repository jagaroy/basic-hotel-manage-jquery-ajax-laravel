<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = ["id","user_id","expense_type","expense_description","expense_amount","expense_time","expense_remarks","authored_by"];
    
	public function users_relation()
	{
		return $this->belongsTo(\App\Models\User::class, "user_id");
	}

}
