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


    public function index()
    {
        $productCategory = ProductCategory::all();
        return view('product.category.index', compact('productCategory'));
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
            'message' => 'Product Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function editProductCategory($id)
    {
        $productCategory = ProductCategory::findorfail($id);
        return view('product.category.edit', compact('productCategory'));
    }

    public function updateProductCategory(Request $request, $id)
    {
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
                'message' => 'Product Category Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product.category')->with($notification);
        } else {
            $notification1 = array(
                'message' => 'Nothing TO Update',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product.category')->with($notification1);

        }

    }
}
