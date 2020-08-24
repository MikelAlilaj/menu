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
                    <a href="{{ route('add.product')}}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>

                            <th class="wd-15p">Business Name</th>




                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $row)
                            <tr>
                                <td>{{ $row->product_name }}</td>






                                <td>



                                    <a href="{{ route('edit.product',$row->id)}}" class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->

@endsection


