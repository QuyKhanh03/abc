@section('title','Kiên Nguyễn | Trang chủ')
@extends('admin.master')
@section('main-content')
        <!-- page content -->
            <!-- /top tiles -->

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_content">

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action text-center">
                            <button class="btn btn-btn-primary"> <a href="{{route('categories.create')}}">
                                    <i class="fa fa-plus" style="color:#0066FF"> Thêm </i></a></button>
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                </tr>
                            </thead>
                                @foreach($data as $key => $value)
                                <tr class="even pointer">
                                    <td class=" ">{{$key+1}}</td>
                                    <td class=" ">{{$value->cat_name}}</td>
                                    <td class=" ">{{ $value->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td class=" last">
                                        <a href="{{route('categories.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('categories.destroy',$value->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                @endforeach
                            <tbody>

                            </tbody>
                        </table>
                    </div>


                </div>
              </div>

            </div>

          <!-- /page content -->


@endsection
