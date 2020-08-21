<?php

namespace App\Http\Controllers;

use App\BusinessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(),
            [
                'type_name' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill all the fields'));
        }

        $business_type = new BusinessType();
        $business_type->type_name = $request->type_name;
        $business_type->isActive = $request->isActive;

        $notification = array(
            'message' => 'Business Type Inserted Successfully',
            'alert-type' => 'success'
        );

        if ($business_type->save())
        {
            return Redirect()->back()->with($notification);
        }
        else
        {
            return redirect()->back()->with('error', sprintf('Error. Please try again'));
        }
    }

    public function EditBusinessType($id)
    {

        $business_type = BusinessType::where('id', $id)->first();
        return view('business.type.edit', compact('business_type'));

    }

    public function UpdateBusinessType(Request $request, $id)
    {

        $validator = Validator::make($request->all(),
            [
                'type_name' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill all the fields'));
        }

        $business_type = BusinessType::find($id);;
        $business_type->type_name = $request->type_name;
        $business_type->isActive = $request->isActive;

        $notification = array(
            'message' => 'Business Type has been updated successfully',
            'alert-type' => 'success'
        );

        if ($business_type->save())
        {
            return Redirect()->route('all.business.types')->with($notification);
        }
        else
        {
            return redirect()->back()->with('error', sprintf('Error. Please try again'));
        }
    }

}
