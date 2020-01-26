<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function categorie()
    {
        return $this->hasOne('App\Categorie');
    }
}
