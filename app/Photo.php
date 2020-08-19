<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/';



    protected $fillable = ['product_category_id' , 'file'];





    public function getFileAttribute($photo){




        return $this->uploads . $photo;



    }


}
