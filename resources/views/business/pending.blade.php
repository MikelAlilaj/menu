@extends('home')
@section('content')


    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Pending Business</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Pending List  </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">First Name</th>
                            <th class="wd-15p">Business Name</th>
                            <th class="wd-15p">Business Type</th>

                            <th class="wd-15p">Business Category</th>



                            <th class="wd-15p">Status</th>

                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($business as $row)
                            <tr>
                                <td>{{ $row->FirstName }}</td>
                                <td>{{ $row->Business_Name }}</td>
                                <td>{{ \App\BusinessType::find($row->type_id)->type_name }} </td>
                                <td>{{ \App\BusinessCategory::find($row->category_id)->category_name }}</td>
                                <td>
                                    @if($row->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @endif

                                </td>



                                <td>

                                    <a href="{{ route('view.new.business',$row->id) }} " class="btn btn-sm btn-info">View</a>



                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->




@endsection
