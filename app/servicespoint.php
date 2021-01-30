<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicespoint extends Model
{
    protected $table='serv';
    protected $fillable=['name_ar','city_name','name_point','branch_name','desc_ar','phone','fax','city_id'];
}
