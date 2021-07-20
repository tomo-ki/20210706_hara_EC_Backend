<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [
        'name', 'file_path'
    ];
}
