<?php

namespace App\Models;
use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;

class  Partners  extends Model
{
    protected $table='partners';
    protected $fillable=['title','model','description','image','logo','link','created_at', 'updated_at'];



    protected static function boot()
    {
        parent::boot();

    }
//    public function scopeActive($query){
//        return $query -> where('statu',1);
//    }

    public function  scopeSelection($query){

        return $query -> select('title','model','description','image','logo','link');
    }

//
//    public function getActive(){
//      return   $this ->statu == 1 ? 'مفعل'  : 'غير مفعل';
//    }


}
