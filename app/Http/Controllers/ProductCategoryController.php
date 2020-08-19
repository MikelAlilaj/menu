<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsCategoryCreateRequest;
use App\Photo;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productsCategory = ProductCategory::all();
        return view('product.category.index', compact('productsCategory'));
    }

    public function create()
    {
        return view('product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductsCategoryCreateRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',


        ]);


        $input = $request->all();
        $user = Auth::user();
        $productCategory = $user->productCategory()->create($input);

        if ($file = $request->file('photo_id')) {
            foreach ($request->photo_id as $key => $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move('images', $name);
                $photo = Photo::create([
                    'product_category_id' => $productCategory->id,
                    'file' => $name
                ]);
            }
        }
        $notification = array(
            'messege' => 'Product Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function EditProductCategory($id)
    {

        $productCategory = DB::table('product_categories')->where('id', $id)->first();

        return view('product.category.edit', compact('productCategory'));

    }

    public function UpdateProductCategory(Request $request, $id)
    {
        //

        $input = $request->all();

        $productCategory = productCategory::find($id);

        if ($file = $request->file('photo_id')) {

            $productCategory->photos()->delete();

            foreach ($request->photo_id as $key => $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move('images', $name);
                $photo = Photo::create([
                    'product_category_id' => $productCategory->id,
                    'file' => $name
                ]);
            }

        }


        $productCategory->update($input);

        if ($productCategory) {
            $notification = array(
                'messege' => 'Business Category Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product.category')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Nothing TO Update',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product.category')->with($notification);

        }

    }
}
