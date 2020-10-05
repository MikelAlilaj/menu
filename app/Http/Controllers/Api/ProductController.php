<?php

namespace App\Http\Controllers\Api;

use App\BusinessCategory;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\User;
use App\ViewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function categoryList()
    {
        $productsCategory = ProductCategory::all();
        $data = array();
        foreach ($productsCategory as $productCategory) {
            $obj = [
                'product_category_id' => $productCategory->id,
                'product_category_name' => $productCategory->name,
                'product_category_description' => $productCategory->description,
                'products_number'=> Product::where('category_id', $productCategory->id)->count(),
            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }


    public function productListByBusinessId()
    {
        $products = Product::where('user_id',Auth::guard('api')->user()->id)->get();
        $data = array();
        foreach ($products as $product) {
            $obj = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'category_name' => BusinessCategory::find($product->category_id)->category_name,
                'price' => $product->price,
            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }

    public function product_by_category($id)
    {
        $products = Product::where('category_id',$id)->get();
        $data = array();
        foreach ($products as $product) {
            $obj = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'category_name' => BusinessCategory::find($product->category_id)->category_name,
                'price' => $product->price,
            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'category_id' => 'required',
                'product_name' => 'required',
                'price' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()->all()[0]

            ]);
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->user_id = Auth::guard('api')->user()->id;

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        if ($product->save()) {
        return response()->json([
            'error' => false,
            'message' => 'Product Inserted Successfully',
        ]);
    }else
        {
            return response()->json(['error' => true, 'message' => 'Please try again']);
        }
    }

    public function mostViewedProducts()
    {
        $products = Product::all();
        $data = array();
        foreach ($products as $product) {
            $obj = [
                'product_name' => $product->product_name,
                'user_count' => ViewProduct::where('product_id', $product->id)->count(),
            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        if(empty($product)) {
            return response()->json([
                'error' => true,
                'message' => 'This Product doesn’t exist',
            ]);
        }
        if($product->delete()) {
            return response()->json([
                'error' => false,
                'message' => 'Product Deleted Successfully',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Error. Please try again later',
            ]);
        }
    }

    public function update_product(Request $request,$id){

        $validator = Validator::make($request->all(),
            [
                'category_id' => 'required',
                'product_name' => 'required',
                'price' => 'required',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()->all()[0]

            ]);
        }
        $product=Product::find($id);
        if(empty($product)) {
            return response()->json([
                'error' => true,
                'message' => 'This Product doesn’t exist',
            ]);
        }
        $product->category_id=$request->input('category_id');
        $product->product_name=$request->input('product_name');
        $product->price=$request->input('price');



        $product->save();
        return response()->json([
            'error' => false,
            'message' => 'Product has been updated successfully',
        ]);
    }

}
