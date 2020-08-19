@extends('home')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Business Category List</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <br>
                <h6 class="card-body-title">Business Category List
                    <a href="{{ route('add.business.category') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($business_category as $row)
                            <tr>
                                <td>{{ $row->category_name }}</td>

                                <td>
                                    @if($row->isActive == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>




                                <td>
                                    <a href="{{ URL::to('/edit/business/category/'.$row->id) }} " class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>





                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->

@endsection
