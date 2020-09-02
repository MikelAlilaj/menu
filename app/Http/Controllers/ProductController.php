<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
            $product = Product::where('user_id',Auth::id())->get();
            return view('product.index', compact('product'));
    }

    public function create()
    {
        $productCategory = ProductCategory::all();
        return view('product.create',compact('productCategory'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'category_id' => 'required',
                'product_name' => 'required',
            ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        $product=new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->user_id = Auth::user()->id;


        if ($product->save())
        {
            $notification1 = array(
                'message' => 'Product Inserted Successfully',
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
            return redirect()->back()->with($notification2);
        }
    }

    public function EditProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product->user_id == Auth::id()) {
            return view('product.edit', compact('product'));
        } else
        {
            $notification2 = array(
                'message' => 'Error. Please try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification2);
        }


    }
    public function UpdateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'product_name' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }


        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;

        if ($product->save())
        {
            $notification1 = array(
                'message' => 'Product has been updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.products')->with($notification1);
        }
        else
        {
            $notification2 = array(
                'message' => 'Error. Please try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification2);
        }
    }



}
