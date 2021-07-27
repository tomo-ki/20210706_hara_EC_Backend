<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = array('id');
    protected $fillable = [
        'order_uuid', 'product_id','quantity'
    ];
}
