<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'year', 'pages'];
    
    use HasFactory;

    public function comments(){
        return $this->hasMany('App\Models\BookComment');
    }
  
}
