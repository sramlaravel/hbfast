<?php

namespace App\Models;

use App\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comenews extends Model
{
    use Notifiable;
    protected $table='news';
    protected $fillable    =['id','news_title','news_desc','phone','news_img','information'];



//
//    protected $hidden = ['category_id', 'password'];
//
//
//    public function scopeActive($query)
//    {
//
//        return $query->where('active', 1);
//    }

    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }


    public function scopeSelection($query)
    {
        return $query->select(['id','news_title','news_desc','phone','news_img','information']);
    }


//    public function category()
//    {
//
//        return $this->belongsTo('App\Models\MainCategory', 'category_id', 'id');
//    }

//    public function getActive()
//    {
//        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
//
//    }

//
//    public function setPasswordAttribute($password)
//    {
//        if (!empty($password)) {
//            $this->attributes['password'] = bcrypt($password);
//        }
//    }
}
