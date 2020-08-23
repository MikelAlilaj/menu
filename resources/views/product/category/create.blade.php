@extends('home')
@section('content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html"></a>
            <span class="breadcrumb-item active">Business Category Section</span>
        </nav>

        <div class="sl-pagebody">


            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Busines Category ADD
                    <a href="{{ route('all.product.category')}}" class="btn btn-success btn-sm pull-right"> All Product Category</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New  Add From</p>

                <form method="post" action="{{ route('store.product.category')}}" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Category Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('category_name') is-invalid @enderror" type="text" name="category_name"  placeholder="Enter Product Category Name">
                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Category Description: <span class="tx-danger">*</span></label>
                                    <input class="form-control  @error('description') is-invalid @enderror" type="text" name="description"  placeholder="Enter Product Category Description">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                    <input  type="file" name="photo_id[]" class="form-control"  multiple="true">

                                </div>
                            </div><!-- col-4 -->

                        </div><!-- end row -->
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
