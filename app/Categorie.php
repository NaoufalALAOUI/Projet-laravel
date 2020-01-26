<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
