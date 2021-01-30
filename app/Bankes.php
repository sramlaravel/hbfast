<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankes extends Model
{
    protected $table='banks';

    protected $fillable=['id','name', 'image'];
}
