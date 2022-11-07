<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hws extends Model
{
    use HasFactory;

    protected $table = 'hws';
    public $timestamps = false;
    public $user_updateat = false;
}
