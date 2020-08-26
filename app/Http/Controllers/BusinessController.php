<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{

    public function index()
    {
        $business = User::join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->select('users.*','business_categories.category_name','business_types.type_name')
            ->where('status',1)
            ->get();
        return view('business.approved', compact('business'));

    }





    public function ViewActiveBusiness($id)
    {

        $business = User::join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->join('states','users.state_id','states.id')
            ->join('cities','users.city_id','cities.id')
            ->select('users.*','business_categories.category_name','business_types.type_name','states.state_name','cities.city_name')
            ->where('users.id',$id)
            ->first();
        return view('business.viewapproved', compact('business'));



    }


    public function NewBusiness(){

        $business = User::join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->select('users.*','business_categories.category_name','business_types.type_name')
            ->where('status',0)
            ->get();
        return view('business.pending', compact('business'));

    }

    public function ViewNewBusiness($id)
    {

        $business = User::join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->join('states','users.state_id','states.id')
            ->join('cities','users.city_id','cities.id')
            ->select('users.*','business_categories.category_name','business_types.type_name','states.state_name','cities.city_name')
            ->where('users.id',$id)
            ->first();
        return view('business.viewpending', compact('business'));

    }

    public function BusinessAccept($id){
        User::where('id',$id)->update(['status'=>1]);
        $notification=array(
            'message'=>'The request has been approved',
            'alert-type'=>'success'
        );
        return Redirect()->route('new.business')->with($notification);
    }

    public function BusinessCancel($id){
        User::where('id',$id)->update(['status'=>2]);
        $notification=array(
            'message'=>'The request has been declined',
            'alert-type'=>'success'
        );
        return Redirect()->route('new.business')->with($notification);
    }
}
