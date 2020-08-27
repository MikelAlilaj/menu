<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\User;
use App\WatchBusiness;
use App\WatchProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function categorylist()
    {


        $productCategory = ProductCategory::all();


        return response()->json($productCategory);
    }
    public function productlistByBusinessId()
    {


        $product = Product::where('user_id',Auth::guard('api')->user()->id)
//            $product = Product::where('user_id',Auth::id())
            ->orderBy('id','DESC')
            ->get();

        return response()->json($product);
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

    public function watched(){

//        $watch = WatchProduct::join('users','watch_businesses.watch_id','users.id')
//            ->select('watch_businesses.*','users.FirstName')
//            ->get();


        $watch = WatchProduct::select(DB::raw('count(*) as user_count, product_id'))
            ->groupBy('product_id')
            ->orderBy('user_count', 'desc')
            ->get();
//        $users = User::whereHas("watch_products")->withCount(['watch_products'])->orderBy('watch_products_count', 'DESC')->get();

        return response()->json($watch);
    }



}
