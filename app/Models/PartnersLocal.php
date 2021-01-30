<?php

namespace App\Models;
use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;

class  PartnersLocal extends Model
{
    protected $table='service_bank';
    protected $fillable=['title','model','description','image','logo','bank_id','created_at', 'updated_at'];




    protected static function boot()
    {
        parent::boot();

    }
//    public function scopeActive($query){
//        return $query -> where('statu',1);
//    }

    public function  scopeSelection($query){

        return $query -> select('title','model','description','image','logo','bank_id');
    }

  public function bank()
{
    return $this->hasOne('App\Models\Banks','id','bank_id');


}
// b   public function getActive(){
//      return   $this ->statu == 1 ? 'مفعل'  : 'غير مفعل';
//    }


}
