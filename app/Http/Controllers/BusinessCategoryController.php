<?php

namespace App\Http\Controllers;

use App\BusinessCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessCategoryController extends Controller
{



    public function index()
    {

            $business_category = BusinessCategory::all();
            return view('business.category.index', compact('business_category'));

    }

    public function create()
    {
        return view('business.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'category_name' => 'required',
            ]);

        $notification = array(
            'message' => 'Please fill all the fields',
            'alert-type' => 'error'
        );

        if ($validator->fails()) {
            return Redirect()->back()->with($notification);
        }


        $business_category=new BusinessCategory();
        $business_category->category_name = $request->category_name;
        $business_category->isActive = $request->isActive;

        $notification1 = array(
            'message' => 'Business Category Inserted Successfully',
            'alert-type' => 'success'
        );

        $notification2 = array(
            'message' => 'Error. Please try again',
            'alert-type' => 'error'
        );

        if ($business_category->save())
        {
            return Redirect()->back()->with($notification1);
        }
        else
        {
            return Redirect()->back()->with($notification2);
        }
    }

    public function EditBusinessCategory($id)
    {
        $business_category = BusinessCategory::findOrFail($id);
        return view('business.category.edit', compact('business_category'));
    }

    public function UpdateBusinessCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'category_name' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill all the fields'));
        }

        $business_category=BusinessCategory::find($id);;
        $business_category->category_name = $request->category_name;
        $business_category->isActive = $request->isActive;

        $notification = array(
            'message' => 'Business Category has been updated successfully',
            'alert-type' => 'success'
        );
        $notification1 = array(
            'message' => 'Error. Please try again',
            'alert-type' => 'error'
        );

        if ($business_category->save())
        {
            return Redirect()->route('all.business.category')->with($notification);
        }
        else
        {
            return redirect()->back()->with($notification1);
        }
    }


}
