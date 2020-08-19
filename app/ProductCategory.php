<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',


    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

}
