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
        $product = Product::join('product_categories','products.category_id','product_categories.id')
            ->select('products.*','product_categories.category_name')
            ->get();
        return view('product.index', compact('product'));

    }

    public function create(){

        $productCategory = ProductCategory::all();

        return view('product.create',compact('productCategory'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'category_id' => 'required',
                'name' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill all the fields'));
        }

        $product=new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;

        $notification = array(
            'message' => 'Business Category Inserted Successfully',
            'alert-type' => 'success'
        );

        if ($product->save())
        {
            return Redirect()->back()->with($notification);
        }
        else
        {
            return redirect()->back()->with('error', sprintf('Error. Please try again'));
        }
    }

    public function EditProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill in all fields.'));
        }


        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->name = $request->name;


        $notification = array(
            'message' => 'Business Category has been updated successfully',
            'alert-type' => 'success'
        );

        if ($product->save())
        {
            return Redirect()->route('all.products')->with($notification);
        }
        else
        {
            return redirect()->back()->with('error', sprintf('Error. Please try again'));
        }
    }



}
