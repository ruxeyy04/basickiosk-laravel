<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    use HasFactory;

    protected $table = 'userinfos';
    protected $primaryKey = 'userid';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
        'usertype',
    ];

}
