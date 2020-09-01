<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'status',
        'type_id',
        'category_id',
        'state_id',
        'city_id',
        'FirstName',
        'LastName',
        'Business_Name',
        'Business_Description',
        'Business_NUIS',
        'Business_Web',
        'Business_Phone',

        'latitude',
        'longtitude',

        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function BusinessCategory(){
        return $this->hasMany('App\BusinessCategory');
    }

    public function BusinessType(){
        return $this->hasMany('App\BusinessType');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function productCategory(){
        return $this->hasMany('App\ProductCategory');
    }

    public function Product(){
        return $this->hasMany('App\Product');
    }

    public function State(){
        return $this->hasMany('App\State');
    }

    public function City(){
        return $this->hasMany('App\City');
    }

    public function isRole(){
        return $this->role;
    }

}
