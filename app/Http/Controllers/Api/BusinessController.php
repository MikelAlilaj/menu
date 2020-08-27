<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\WatchBusiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($login)) {
            return response(['invalid login credentials.']);
    }
        $accessToke = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'access_token' => $accessToke]);
    }

    public function updatebyid(Request $request,$id){

        $user=User::find($id);
        $user->FirstName=$request->input('FirstName');
        $user->LastName=$request->input('LastName');
        $user->Business_Name=$request->input('Business_Name');
        $user->Business_Description=$request->input('Business_Description');
        $user->Business_NUIS=$request->input('Business_NUIS');
        $user->Business_Web=$request->input('Business_Web');

        $user->save();
        return response()->json([
            'error' => false,
            'message' => 'Business Inserted Successfully',
        ]);
    }

    public function watched(){

        $watch = WatchBusiness::join('users','watch_businesses.watch_id','users.id')
            ->select('watch_businesses.*','users.FirstName')
            ->get();

        return response()->json($watch);

//        $users = User::whereHas("watch_businesses")->withCount(['watch_businesses'])->orderBy('watch_businesses_count', 'DESC')->get();
    }

    public function show($id){


        $user=User::find($id);
        return response()->json($user);
    }





}
