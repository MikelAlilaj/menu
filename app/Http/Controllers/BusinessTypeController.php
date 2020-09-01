<?php

namespace App\Http\Controllers;

use App\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessTypeController extends Controller
{

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

        $validator = Validator::make($request->all(),
            [
                'type_name' => 'required',
            ]);

        $notification = array(
            'message' => 'Please fill all the fields',
            'alert-type' => 'error'
        );

        if ($validator->fails()) {
            return Redirect()->back()->with($notification);
        }

        $business_type = new BusinessType();
        $business_type->type_name = $request->type_name;
        $business_type->isActive = $request->isActive;

        $notification1 = array(
            'message' => 'Business Type Inserted Successfully',
            'alert-type' => 'success'
        );
        $notification2 = array(
            'message' => 'Error. Please try again',
            'alert-type' => 'error'
        );

        if ($business_type->save())
        {
            return Redirect()->back()->with($notification1);
        }
        else
        {
            return Redirect()->back()->with($notification2);
        }
    }

    public function EditBusinessType($id)
    {

        $business_type = BusinessType::findOrFail($id);
        return view('business.type.edit', compact('business_type'));

    }

    public function UpdateBusinessType(Request $request, $id)
    {

        $validator = Validator::make($request->all(),
            [
                'type_name' => 'required',
            ]);

        $notification = array(
            'message' => 'Please fill all the fields',
            'alert-type' => 'error'
        );

        if ($validator->fails()) {
            return Redirect()->back()->with($notification);
        }

        $business_type = BusinessType::find($id);
        $business_type->type_name = $request->type_name;
        $business_type->isActive = $request->isActive;



        $notification1 = array(
            'message' => 'Business Type has been updated successfully',
            'alert-type' => 'success'
        );

        $notification2 = array(
            'message' => 'Error. Please try again',
            'alert-type' => 'error'
        );

        if ($business_type->save())
        {
            return Redirect()->route('all.business.types')->with($notification1);
        }
        else
        {
            return Redirect()->back()->with($notification2);
        }
    }

}
