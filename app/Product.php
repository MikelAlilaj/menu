<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'product_name',


    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
