<?php

namespace App\Http\Controllers;

use App\Mobile_Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home');
    }

    public function reports()
    {
        $users = User::where('status','=','1')->count();
        $records = User::select(DB::raw('*'))
            ->whereRaw('Date(created_at) = CURDATE()')->count();


        $today_users=User::where('status','=','1')
            ->whereDate('users.created_at', '=', date('Y-m-d'))->count();

        $week_users=User::where('status','=','1')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();

        $month_users=User::where('status','=','1')
            ->whereMonth('users.created_at', '=', date('m'))
            ->whereYear('users.created_at', '=', date('Y'))
            ->count();

        $date = \Carbon\Carbon::today()->subDays(30);
        $users30 = User::where('created_at','>=',$date)->get();


        return view('reports',compact('users','records','today_users','week_users','month_users','users30'));
    }


    public function Logout()
    {
        // $logout= Auth::logout();
        Auth::logout();
        $notification=array(
            'messege'=>'Successfully Logout',
            'alert-type'=>'success'
        );
        return Redirect()->route('login')->with($notification);


    }

    public function ChangePassword()
    {
        return view('business.ChangePassword');
    }

    public function updatePassword(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        $newpass=$request->password;
        $confirm=$request->password_confirmation;
        if (Hash::check($oldpass,$password)) {
            if ($newpass === $confirm) {
                $user=User::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                $notification=array(
                    'message'=>'Password Changed Successfully ! Now Login with Your New Password',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.products')->with($notification);
            }else{
                $notification=array(
                    'message'=>'New password and Confirm Password not matched!',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'message'=>'Old Password not matched!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

}
