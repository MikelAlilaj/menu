@extends('home')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Business List</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <br>
                <h6 class="card-body-title">Business List
                    <a href=" " class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">First Name</th>
                            <th class="wd-15p">Business Name</th>
                            <th class="wd-15p">Business Type</th>

                            <th class="wd-15p">Business Category</th>



                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($business as $row)
                            <tr>
                                <td>{{ $row->FirstName }}</td>
                                <td>{{ $row->Business_Name }}</td>
                                <td>{{ $row->type_name }}</td>
                                <td>{{ $row->category_name }}</td>






                                <td>



                                    <a href="{{ route('ViewActive.business',$row->id) }}" class="btn btn-sm btn-warning" title="Show"><i class="fa fa-eye"></i></a>

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->

@endsection


