<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chall extends Model
{
    use HasFactory;

    protected $table = 'chall';
    public $timestamps = false;
    public $user_updateat = false;
}
