<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hwt extends Model
{
    use HasFactory;

    protected $table = 'hwt';
    public $timestamps = false;
    public $user_updateat = false;
}
