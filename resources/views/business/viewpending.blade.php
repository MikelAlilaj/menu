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
                <h6 class="card-body-title">Business Details Page  </h6>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">First Name: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->FirstName }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->LastName }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business Name: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_Name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business Description: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_Description }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business Type: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->type_name }}</strong>
                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business City: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_City }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business State: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_State }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business NUIS: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_NUIS }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business Web: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_Web }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Business Phone: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Business_Phone }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->email }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Address: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Address }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->category_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Location: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $business->Location }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label><br>

                                <strong>
                                    @if($business->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </strong>
                            </div>
                        </div><!-- col-4 -->
                    </div> <!-- col-4 -->


                </div><!-- end row -->

                @if($business->status == 0)
                    <a href="{{ url('business/accept/'.$business->id) }}" class="btn btn-info">Business Accept </a>
                    <br>
                    <a href="{{ url('business/cancel/'.$business->id) }}" class="btn btn-danger">Business Cancel </a>
                @endif


            </div><!-- form-layout -->
        </div><!-- card -->


    </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


@endsection
