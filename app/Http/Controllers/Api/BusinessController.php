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
                'type_id' => 'required|integer',
                'category_id' => 'required|integer',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'FirstName' => 'required|string|max:255',
                'LastName' => 'required|string|max:255',
                'Business_Name' => 'required|string|max:255',
                'Business_Description' => 'required|max:555',
                'Business_NUIS' => 'required|max:15',
                'Business_Web' => 'required|max:100',
                'Business_Phone' => 'required|string|max:255',
                'latitude' => 'required',
                'longtitude' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' =>  'required|min:8',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validation fails',
            ]);
        }

         User::create([

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

    public function updatebyid(Request $request,$id){

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
                    'message' => 'validation fails',
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

    public function WhoHasViewed(){

        $ViewBusiness = ViewBusiness::all();
        $data = array();
        foreach ($ViewBusiness as $Business) {
            $obj = [
                'First_Name' =>User::find($Business->user_id)->FirstName,
                'view_by' => User::find($Business->view_by_id)->FirstName,
            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }



    public function ShowBusiness($id){
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


}
