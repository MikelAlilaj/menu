<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state_name',




    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
