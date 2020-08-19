@extends('home')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html"></a>
            <span class="breadcrumb-item active">Business Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Business Category
                    <a href="{{ route('all.business.category')}}" class="btn btn-success btn-sm pull-right"> All Business Category</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Business From</p>
                <form method="post" action="{{ url('/update/business/category/'.$business_category->id) }} " enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Business Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name" value="{{ $business_category->category_name }}" >
                                </div>
                            </div><!-- col-4 -->


                        </div><!-- end row -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="isActive" value="1" <?php if ($business_category->isActive == 1) {
                                    echo "checked"; }  ?> >
                                <span>Is Active</span>
                            </label>

                        </div> <!-- col-4 -->
                    </div>
                    <br><br>



                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update Business Category</button>

                    </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

        </form>

    </div><!-- row -->


@endsection
