<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'content'];
    // protected $fillable = [];
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'content',
    // ];
    public function comments(){
        return $this->hasMany('App\Models\BlogpostComment');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
