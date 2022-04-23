<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Profile;

class Author extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
