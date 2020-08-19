<?php

namespace App\Http\Controllers\Auth;

use App\BusinessCategory;
use App\BusinessType;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'Business_Name' => ['required', 'string', 'max:255'],
            'Business_Description' => ['required', 'string', 'max:255'],
            'Business_City' => ['required', 'string', 'max:255'],
            'Business_State' => ['required', 'string', 'max:255'],
            'Business_NUIS' => ['required', 'string', 'max:255'],
            'Business_Web' => ['required', 'string', 'max:255'],
            'Business_Phone' => ['required', 'string', 'max:255'],
            'Address' => ['required', 'string', 'max:255'],
            'Location' => ['required', 'string', 'max:255'],
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

            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'Business_Name' => $data['Business_Name'],
            'Business_Description' => $data['Business_Description'],
            'Business_City' => $data['Business_City'],
            'Business_State' => $data['Business_State'],
            'Business_NUIS' => $data['Business_NUIS'],
            'Business_Web' => $data['Business_Web'],
            'Business_Phone' => $data['Business_Phone'],
            'Address' => $data['Address'],
            'Location' => $data['Location'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showRegistrationForm()
    {
        $business_category = DB::table('business_categories')->get();
        $business_types = DB::table('business_types')->get();

        return view('auth.register',compact('business_category','business_types'));
    }
}
