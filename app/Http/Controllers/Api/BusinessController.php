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
      'type_id' => $data['type_id'],
      'category_id' => $data['category_id'],

      'state_id' => $data['state_id'],
      'city_id' => $data['city_id'],

      'FirstName' => $data['FirstName'],
      'LastName' => $data['LastName'],
      'Business_Name' => $data['Business_Name'],
      'Business_Description' => $data['Business_Description'],

      'Business_NUIS' => $data['Business_NUIS'],
      'Business_Web' => $data['Business_Web'],
      'Business_Phone' => $data['Business_Phone'],
      'Address' => $data['Address'],
      'Location' => $data['Location'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),



  ]);


        return response()->json([
            'error'=>false,
            'message' => 'Business Inserted Successfully',
        ]);


    }



