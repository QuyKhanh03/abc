@section('title','Kiên Nguyễn | Trang chủ')
@extends('admin.master')
@section('main-content')
    <!-- page content -->
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title
                    ">Danh sách sản phẩm</h2>
                    <a href="{{route('products.create')}}" class="btn btn-primary float-right">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Loại sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $product)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$product->pro_name}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$product->images)}}" alt="" style="width: 100px">
                                </td>
                                <td>{{number_format($product->price)}}</td>
                                <td>{{$product->category->cat_name}}</td>
                                <td>
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning">Sửa</a>
                                    <form action="{{route('products.destroy',$product->id)}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /page content -->

@endsection
