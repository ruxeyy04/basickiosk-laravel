<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'serial_id';
    public $timestamps = true;

    protected $fillable = [
        'serial_id',
        'name',
        'manufacturer',
        'manufactured_date',
        'exp_date',
        'price',
        'quantity',
        'image',
        'status',
    ];

    // Additional model methods or relationships can be defined here
}
