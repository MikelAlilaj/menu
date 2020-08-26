@extends('home')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Product Category List</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <br>
                <h6 class="card-body-title">Product Category List
                    <a href="{{ route('add.product.category') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Product Category Name</th>
                            <th class="wd-15p">Product Category Description</th>
                            <th class="wd-15p">Product Category Image</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($productCategory as $row)
                            <tr>
                                <td>{{ $row->category_name }}</td>
                                <td>{{ $row->description }}</td>

                                <td>
                                    @foreach($row->photos as $photo)

                                        <img src="{{ URL::to($photo->file) }}" height="50px;" width="50px;">
                                    @endforeach

                                </td>





                                <td>
                                    <a href="{{ route('edit.product.category',$row->id) }} " class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>





                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div><!-- sl-mainpanel -->

@endsection
