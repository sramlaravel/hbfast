<?php

namespace App;

use App\Http\Controllers\cityController;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table='countries';
    protected $fillable  =['name_ar','desc_ar','value'];
    public function  cities(){

            return $this->hasMany(City::class);

    }
}
