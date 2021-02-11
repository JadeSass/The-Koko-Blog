<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'image', 'ends_at', 'ads_type', 'link', 'description', 'user_id'
    ];


    protected $dates = ['deleted_at'];

    public $incrementing = false;
    public static function boot(){
        parent::boot();
        static::creating(function ($advert){
            $advert->id = str_random(15);
        });
    }
}
