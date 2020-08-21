<?php

namespace App\Http\Controllers;

use App\BusinessCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
            return redirect()->back()->with('error', sprintf('Please fill all the fields'));
        }

        $business_category=new BusinessCategory();
        $business_category->category_name = $request->category_name;
        $business_category->isActive = $request->isActive;

        $notification = array(
            'message' => 'Business Category Inserted Successfully',
            'alert-type' => 'success'
        );

        if ($business_category->save())
        {
            return Redirect()->back()->with($notification);
        }
        else
        {
            return redirect()->back()->with('error', sprintf('Error. Please try again'));
        }
    }

    public function EditBusinessCategory($id)
    {
        $business_category = BusinessCategory::where('id', $id)->first();
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

        if ($business_category->save())
        {
            return Redirect()->route('all.business.category')->with($notification);
        }
        else
        {
            return redirect()->back()->with('error', sprintf('Error. Please try again'));
        }
    }


}
