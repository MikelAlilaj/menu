<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{

    public function index()
    {
        $business = DB::table('users')
            ->join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->select('users.*','business_categories.category_name','business_types.type_name')
            ->where('status',1)
            ->get();
        return view('business.approved', compact('business'));

    }


    public function ViewApprovedBusiness($id)
    {

        $business = DB::table('users')
            ->join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->select('users.*','business_categories.category_name','business_types.type_name')
            ->where('users.id',$id)
            ->first();
        return view('business.viewapproved', compact('business'));



    }


    public function NewBusiness(){

        $business = DB::table('users')
            ->join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->select('users.*','business_categories.category_name','business_types.type_name')
            ->where('status',0)
            ->get();
        return view('business.pending', compact('business'));

    }

    public function ViewNewBusiness($id)
    {

        $business = DB::table('users')
            ->join('business_categories','users.category_id','business_categories.id')
            ->join('business_types','users.type_id','business_types.id')
            ->select('users.*','business_categories.category_name','business_types.type_name')
            ->where('users.id',$id)
            ->first();
        return view('business.viewpending', compact('business'));

    }

    public function BusinessAccept($id){
        DB::table('users')->where('id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Business Accept Done',
            'alert-type'=>'success'
        );
        return Redirect()->route('new.business')->with($notification);
    }

    public function BusinessCancel($id){
        DB::table('users')->where('id',$id)->update(['status'=>2]);
        $notification=array(
            'messege'=>'Business Cancel',
            'alert-type'=>'success'
        );
        return Redirect()->route('new.business')->with($notification);
    }
}
