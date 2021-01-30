<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table='news';
    protected $fillable    =['id','news_title','news_desc','phone','news_img','information'  ];
}
