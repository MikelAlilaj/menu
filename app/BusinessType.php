<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $fillable = [
        'type_name',
        'isActive',



    ];



    public function user(){
        return $this->belongsTo('App\User');
    }
}
