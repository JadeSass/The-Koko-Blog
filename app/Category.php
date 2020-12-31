<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $fillable = [
    //     'name','id_cat'
    // ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public $incrementing = false;
    public static function boot(){
        parent::boot();
        static::creating(function ($category){
            $category->id = str_random(20);
        });
    }
}
