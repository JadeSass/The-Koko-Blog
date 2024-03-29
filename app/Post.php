<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'category_id', 'slug', 'user_id','image'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getImageAttribute($image)
    {
        return asset($image);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function incrementReadCount() {
        $this->view_count++;
        return $this->save();
    }
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    public static function boot(){
        parent::boot();
        static::creating(function ($post){
            $post->id = str_random(20);
        });
    }
}
