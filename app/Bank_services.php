<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_services extends Model
{
    protected $table='service_bank';

    protected $fillable=['title','model','description','image','logo','bank_id'];


}
