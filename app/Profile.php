<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function getImageAttribute($avatar)
    {
        return asset($avatar);
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id','avatar','facebook','number'];
    public $incrementing = false;
    public static function boot(){
        parent::boot();
        static::creating(function ($profile){
            $profile->id = str_random(20);
        });
    }
}
