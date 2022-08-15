<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','price','version','desc','image','category_id'];

    public function categories()
    {
       return $this->belongsToMany('App\Category');
    }
}
