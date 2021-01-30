<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{

protected $table='locations';
    protected $fillable    =['location_name_ar','desc_ar','phone','location_type','lat','lng' ,'icon','email','zoom'];
}
