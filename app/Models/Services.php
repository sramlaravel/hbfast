<?php

namespace App\Models;
use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table='services';
    protected $fillable=['title','title_desc','model','description','image','statu', 'created_at', 'updated_at'];


    protected static function boot()
    {
        parent::boot();

    }
    public function scopeActive($query){
        return $query -> where('statu',1);
    }

    public function  scopeSelection($query){

        return $query -> select('id','title','title_desc','model','description','image','statu');
    }


    public function getActive(){
      return   $this ->statu == 1 ? 'مفعل'  : 'غير مفعل';
    }


}
