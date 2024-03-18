<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Author extends  Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    // public function setNameAttribute($name)
    // {

    //     return ucwords($name);
    // }

    // public function setCountryAttribute($country)
    // {

    //     $this->data['country'] = bcrypt($country);
    // }
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
