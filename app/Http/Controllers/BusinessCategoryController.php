<?php

namespace App\Http\Controllers;

use App\BusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->validate(request(), [
            'category_name' => 'required',


        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['isActive'] = $request->isActive;
        $business_category = DB::table('business_categories')->insert($data);

        $notification = array(
            'messege' => 'Business Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditBusinessCategory($id)
    {
        $business_category = DB::table('business_categories')->where('id', $id)->first();
        return view('business.category.edit', compact('business_category'));

    }

    public function UpdateBusinessCategory(Request $request, $id)
    {

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['isActive'] = $request->isActive;


        $business_category = DB::table('business_categories')->where('id', $id)->update($data);
        if ($business_category) {
            $notification=array(
                'messege'=>'Business Category Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.business.category')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Nothing TO Update',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.business.category')->with($notification);

        }


    }
}
