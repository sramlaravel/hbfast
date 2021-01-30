<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{


    protected $table='cities';
    protected $fillable  =['city_name','desc','country_id' ];
    public function countries() {
        return $this->belongsTo(country::class);
    }

    public function servic_point() {
        return $this->hasMany(service_point::class);
    }
}
