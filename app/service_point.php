<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_point extends Model
{

    protected $table='services_point';
    protected $fillable =['name_point','poin_id','branch_name','desc_ar','phone','fax' ,'city_id' ];
    public function cities ()
    {
        return $this->belongsTo(City::class);
    }




}
