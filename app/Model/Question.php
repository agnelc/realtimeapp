<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{

//    protected static function boot()
//    {
//        parent::boot();
//        static::creating(function ($question) {
//            $question->slug = str_slug($question->title);
//        });
//    }

    protected $guarded = [];
    // protected $fillable = ['title','slug','body','user_id','category_id'];

//    protected $with = ['replies'];

    public function getRouteKeyName()
    {
        return 'slug';
    }



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){
        return asset("api/question/$this->slug");

//        return "/question/$this->slug";

    }
}
