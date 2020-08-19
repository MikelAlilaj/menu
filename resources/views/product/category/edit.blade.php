@extends('home')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html"></a>
            <span class="breadcrumb-item active">Product Category Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Product Category
                    <a href="{{ route('all.product.category')}}" class="btn btn-success btn-sm pull-right"> All Business Type</a>
                </h6>

                <p class="mg-b-20 mg-sm-b-30">Update Business From</p>
                <form method="post" action="{{ url('/update/product/category/'.$productCategory->id) }} " enctype="multipart/form-data">
                    @csrf



                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Category Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $productCategory->name }}" >
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Category Description: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description" value="{{ $productCategory->description }}" >
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control"  type="file" name="photo_id[]"   multiple="true">
                                </div>
                            </div><!-- col-4 -->


                        </div><!-- end row -->


                        <br><br>



                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Update Business Type</button>

                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
            </div><!-- card -->

            </form>

        </div><!-- row -->


@endsection
