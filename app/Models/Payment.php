<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'payment_id';
    public $incrementing = true;
    protected $table = 'payment';

    protected $fillable = [
        'payment_id',
        'totalamount',
        'order_id',
    ];

}
