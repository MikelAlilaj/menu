<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable = [
        'user_id',
        'category_id',
        'product_name',


    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
