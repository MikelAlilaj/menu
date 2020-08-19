<?php

namespace App\Http\Controllers;

use App\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $business_type  = BusinessType::all();
        return view('business.type.index', compact('business_type'));
    }

    public function create()
    {
        return view('business.type.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'type_name' => 'required',


        ]);

        $data = array();
        $data['type_name'] = $request->type_name;
        $data['isActive'] = $request->isActive;
        $business_types = DB::table('business_types')->insert($data);
        $notification = array(
            'messege' => 'Business Type Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditBusinessType($id)
    {
        $business_type = DB::table('business_types')->where('id', $id)->first();
        return view('business.type.edit', compact('business_type'));

    }

    public function UpdateBusinessType(Request $request, $id)
    {

        $data = array();
        $data['type_name'] = $request->type_name;
        $data['isActive'] = $request->isActive;

        $business_type = DB::table('business_types')->where('id', $id)->update($data);

        if ($business_type) {
            $notification=array(
                'messege'=>'Business Type Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.business.types')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Nothing TO Update',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.business.types')->with($notification);

        }


    }
}
