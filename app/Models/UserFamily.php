<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFamily extends Model
{
    protected $fillable = ['name', 'age', 'email', 'password', 'has_friends', 'has_money'];
    use HasFactory;
}
