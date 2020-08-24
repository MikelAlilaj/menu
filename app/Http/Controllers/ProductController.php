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

            $product = Product::where('user_id',Auth::id())
                ->orderBy('id','DESC')
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
                'product_name' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill all the fields'));
        }

        $product=new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->user_id = Auth::user()->id;

        $notification = array(
            'message' => 'Product Inserted Successfully',
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
        if ($product->user_id == Auth::id()) {
            return view('product.edit', compact('product'));
        } else
        {
            return redirect()->back()->with('error', sprintf('Kerkesa juaj nuk mund te procesohet.'));
        }


    }
    public function UpdateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'product_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', sprintf('Please fill in all fields.'));
        }


        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;


        $notification = array(
            'message' => 'Product has been updated successfully',
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
