<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 
        'image', 
        'description',
        'user_id',
        'category_id',
        'slider',
        'price'
    ];
    public function user(){
        return $this->belongsto('App\User');

    }

    public function category(){
        return $this->belongsto('App\Category');
        
    }
}
