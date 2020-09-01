@extends('home')
@section('content')
    @php
        use App\ProductCategory;$productCategory = ProductCategory::all();
    @endphp
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html"></a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Product
                    <a href="{{ route('all.products')}}" class="btn btn-success btn-sm pull-right"> All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Product From</p>
                <form method="post" action="{{ route('update.product', $product->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" >
                                </div>
                            </div><!-- col-4 -->




                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Business Type" name="category_id">
                                    <option label="Choose Business Type"></option>

                                    @foreach($productCategory as $br)

                                            <option value="{{ $br->id }}" <?php if ($br->id == $product->category_id) {
                                                echo "selected"; } ?> >{{ $br->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        </div><!-- end row -->
                        <br><br>



                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update Product</button>

                    </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

        </form>

    </div><!-- row -->


@endsection
