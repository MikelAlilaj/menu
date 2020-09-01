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

    public function categorylist()
    {

        $productsCategory = ProductCategory::all();
        $data = array();
        foreach ($productsCategory as $productCategory) {
            $obj = [
                'product_name' => $productCategory->name,
                'product_description' => $productCategory->description,

            ];
            array_push($data, $obj);
        }

        return response()->json(['error' => false, 'message' => 'Success', 'data' => $data]);
    }



    public function productlistByBusinessId()
    {


        $products = Product::where('user_id',Auth::guard('api')->user()->id)->get();
        $data = array();
        foreach ($products as $product) {
            $obj = [
                'product_name' => $product->product_name,
                'category_name' => BusinessCategory::find($product->category_id)->category_name,
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
            ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validation fails',
            ]);
        }


        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
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

    public function MostViewedProducts()
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


}
