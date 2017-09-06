<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }
}
