<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ["id","customer_name","customer_phone","customer_email","customer_address","customer_gender","customer_photo","customer_status","customer_remarks","authored_by"];
    

}
