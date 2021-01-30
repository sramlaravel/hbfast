<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Sliderhome extends Model
{
    protected $table='sliders';

protected $fillable=['title','description','image','statu'];

}
