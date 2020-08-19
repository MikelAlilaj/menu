<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $fillable = [
        'category_name',
        'isActive',



    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
