<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    public function store(Request $request)
    {


        return User::create([


            'status' => 0,
            'type_id' => $request['type_id'],
            'category_id' => $request['category_id'],

            'state_id' => $request['state_id'],
            'city_id' => $request['city_id'],

            'FirstName' => $request['FirstName'],
            'LastName' => $request['LastName'],
            'Business_Name' => $request['Business_Name'],
            'Business_Description' => $request['Business_Description'],

            'Business_NUIS' => $request['Business_NUIS'],
            'Business_Web' => $request['Business_Web'],
            'Business_Phone' => $request['Business_Phone'],
            'latitude' => $request['latitude'],
            'longtitude' => $request['longtitude'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),


        ]);


        return response()->json([
            'error' => false,
            'message' => 'Business Inserted Successfully',
        ]);


    }


}
