@extends('home')
@section('content')


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html"></a>
            <span class="breadcrumb-item active">Business Type Section</span>
        </nav>

        <div class="sl-pagebody">


            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Busines Type ADD
                    <a href="{{ route('all.business.types')}}" class="btn btn-success btn-sm pull-right"> All Business Type</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New  Add From</p>

                <form method="post" action="{{ route('store.business.type')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Business Type Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('type_name') is-invalid @enderror" type="text" name="type_name"  placeholder="Enter Business Name">
                                    @error('type_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->



                        </div><!-- end row -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="isActive" value="1">
                                <span>Is Active</span>
                            </label>

                        </div> <!-- col-4 -->
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
