<?php

namespace App\Http\Controllers\Auth;

use App\BusinessCategory;
use App\BusinessType;
use App\City;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\State;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'type_id' => ['required'],
            'category_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],

            'latitude' => ['required'],
            'longtitude' => ['required'],

            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'Business_Name' => ['required', 'string', 'max:255'],
            'Business_Description' => ['required', 'string', 'max:255'],

            'Business_NUIS' => ['required', 'string', 'max:255'],
            'Business_Web' => ['required', 'string', 'max:255'],
            'Business_Phone' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
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
            'latitude' => $data['latitude'],
            'longtitude' => $data['longtitude'],

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showRegistrationForm()
    {
        $business_category = BusinessCategory::all();
        $business_types  = BusinessType::all();

        $state = State::all();

        $city=City::join('states','cities.state_id','states.id')
            ->select('cities.*','states.state_name')
            ->get();

        return view('auth.register',compact('business_category','business_types','state','city'));
    }

    public function GetSubcat($state_id){
        $cat=City::where('state_id',$state_id)->get();
        return json_encode($cat);
    }
}
