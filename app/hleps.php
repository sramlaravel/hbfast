<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hleps extends Model
{
    //
    protected $table='helps';
    public $fillable = ['name', 'email', 'phone','send_for','subject', 'message'];
}
