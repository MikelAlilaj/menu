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
                <h6 class="card-body-title">New Product ADD
                    <a href="{{ route('all.products')}}" class="btn btn-success btn-sm pull-right"> All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New  Add From</p>

                <form method="post" action="{{ route('store.product')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control  " type="text" name="product_name"  placeholder="Enter Product Name" required>

                                    <span class="invalid-feedback" role="alert">

                                    </span>

                                </div>
                            </div><!-- col-4 -->




                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="category_id" required>
                                    <option label="Choose Category"></option>
                                    @foreach($productCategory as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        </div><!-- end row -->
                    </div>

                    <br><br>


                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit Form</button>

                    </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

        </form>




    </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
