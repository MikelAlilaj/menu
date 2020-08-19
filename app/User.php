<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'type_id',
        'category_id',
        'FirstName',
        'LastName',
        'Business_Name',
        'Business_Description',
        'Business_City',
        'Business_State',
        'Business_NUIS',
        'Business_Web',
        'Business_Phone',
        'Address',
        'Location',
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

}
