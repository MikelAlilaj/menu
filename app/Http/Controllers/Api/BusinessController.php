<?php

namespace App\Http\Controllers\Api;

use App\BusinessCategory;
use App\BusinessType;
use App\City;
use App\Http\Controllers\Controller;
use App\State;
use App\User;
use App\dddBusiness;
use App\ViewBusiness;
use App\ViewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [

                'category_id' => 'required',
                'city_id' => 'required',
                'FirstName' => 'required',
                'LastName' => 'required',
                'Business_Name' => 'required',
                'Business_Description' => 'required',
                'Business_NUIS' => 'required',
                'Business_Web' => 'required',
                'Business_Phone' => 'required',
                'latitude' => 'required',
                'longtitude' => 'required',
                'email' => 'required|unique:users',
                'password' =>  'required',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),

            ]);
        }


        $user =  User::create([

            'status' => 0,
            'type_id' => 1,
            'category_id' => $request['category_id'],

            'state_id' => 1,
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

        if ($user->save())
        {
            return response()->json([
                'error' => false,
                'message' => 'Business Inserted Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'error' => false,
                'message' => 'Error. Please try again',
            ]);

        }
    }



    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (!Auth::attempt($login)) {

            return response()->json([
                'error' => false,
                'message' => 'invalid login credentials.',
            ]);
    }
        $accessToke = Auth::user()->createToken('authToken')->accessToken;


        return response()->json([
            'error' => false,
            'message' => 'You are successfully logged in','access_token' => $accessToke
        ]);
    }

    public function updateById(Request $request,$id){

            $validator = Validator::make($request->all(),
                [
                    'FirstName' => 'required',
                    'LastName' => 'required',
                    'Business_Name' => 'required',
                    'Business_Description' => 'required',
                    'Business_NUIS' => 'required',
                    'Business_Web' => 'required',
                    'Business_Phone' => 'required',
                    'Email' => 'required',
                ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),

            ]);
        }
        $user=User::find($id);
        $user->FirstName=$request->input('FirstName');
        $user->LastName=$request->input('LastName');
        $user->Business_Name=$request->input('Business_Name');
        $user->Business_Description=$request->input('Business_Description');
        $user->Business_NUIS=$request->input('Business_NUIS');
        $user->Business_Web=$request->input('Business_Web');
        $user->Business_Phone=$request->input('Business_Phone');
        $user->Email=$request->input('Email');

        $user->save();
        return response()->json([
            'error' => false,
            'message' => 'Has been updated',
        ]);
    }

    public function whoHasViewed(){

        $viewBusiness = ViewBusiness::all();
        $data = array();
        foreach ($viewBusiness as $business) {
            $obj = [
                'First_Name' =>User::find($business->user_id)->FirstName,
                'view_by' => User::find($business->view_by_id)->FirstName,
            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }



    public function showBusiness($id){
        $user=User::find($id);
        $data = array();

            $obj = [
                'First_Name'=> $user->FirstName,
                'Last_Name' => $user->LastName,
                'Business_Name' => $user->Business_Name,
                'Business_Description' => $user->Business_Description,
                'Business_NUIS' => $user->Business_NUIS,
                'Business_Web' => $user->Business_Web,
                'Business_Phone' => $user->Business_Phone,
                'Email' => $user->email,
                'type_name' => BusinessType::find($user->type_id)->type_name,
                'category_name' => BusinessCategory::find($user->category_id)->category_name,
                'state_name' => State::find($user->state_id)->state_name,
                'city_name' => City::find($user->city_id)->city_name,

            ];
            array_push($data, $obj);

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }


    public function cities_list()
    {
        $cities = City::all();
        $data = array();
        foreach ($cities as $city) {
            $obj = [
                'city_id' => $city->id,
                'city_name' => $city->city_name,

            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }

    public function business_category_list()
    {
        $businessCategories = BusinessCategory::all();
        $data = array();
        foreach ($businessCategories as $businessCategory) {
            $obj = [
                'business_category_id' => $businessCategory->id,
                'business_category_name' => $businessCategory->category_name,

            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }

}
