<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';
   protected $fillable=['title','title_desc','model','description','image','statu'];
}
