<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'state_id', 'city_name'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
