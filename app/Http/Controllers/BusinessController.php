<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{

    public function index(){
        $business = User::where('status',1)->get();
        return view('business.approved', compact('business'));
    }

    public function ViewActiveBusiness($id){
        $business = User::findorfail($id);
        return view('business.viewapproved', compact('business'));
    }

    public function NewBusiness(){
        $business = User::where('status',0)->get();
        return view('business.pending', compact('business'));
    }

    public function ViewNewBusiness($id){
        $business = User::findorfail($id);
        return view('business.viewpending', compact('business'));
    }

    public function BusinessAccept($id){
        User::find($id)->update(['status'=>1]);
        $notification=array(
            'message'=>'The request has been approved',
            'alert-type'=>'success'
        );
        return Redirect()->route('new.business')->with($notification);
    }

    public function BusinessCancel($id){
        User::find($id)->update(['status'=>2]);
        $notification=array(
            'message'=>'The request has been declined',
            'alert-type'=>'success'
        );
        return Redirect()->route('new.business')->with($notification);
    }
}
