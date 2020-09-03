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

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        $business_category=new BusinessCategory();
        $business_category->category_name = $request->category_name;
        $business_category->isActive = $request->isActive;

        if ($business_category->save())
        {
            $notification1 = array(
                'message' => 'Business Category Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification1);
        }
        else
        {
            $notification2 = array(
                'message' => 'Error. Please try again',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification2);
        }
    }

    public function editBusinessCategory($id)
    {
        $business_category = BusinessCategory::findOrFail($id);
        return view('business.category.edit', compact('business_category'));
    }

    public function updateBusinessCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'category_name' => 'required',
            ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        $business_category=BusinessCategory::find($id);;
        $business_category->category_name = $request->category_name;
        $business_category->isActive = $request->isActive;

        if ($business_category->save()) {
            $notification1 = array(
            'message' => 'Business Category has been updated successfully',
            'alert-type' => 'success'
        );
            return Redirect()->route('all.business.category')->with($notification1);
        }
        else {
            $notification2 = array(
            'message' => 'Error. Please try again',
            'alert-type' => 'error'
        );
            return redirect()->back()->with($notification2);
        }
    }


}
