@section('title','Kiên Nguyễn | Trang chủ')
@extends('admin.master')
@section('main-content')
    <!-- page content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <h3>Thêm sản phẩm</h3>
                    </div>
                    <div class="col float-end">
                        <a href="{{route('categories.index')}}" class="btn btn-primary ">Danh sách</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('products.update',$model->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="pro_name" value="{{$model->pro_name}}">
                                @if($errors->has('pro_name'))
                                    <p class="text-danger">{{$errors->first('pro_name')}}</p>
                                @endif
                            </div>
                            <div class="form-group col">
                                <label for="image">Ảnh</label>
                                <input type="file" class="form-control" id="image" name="images">
                                <img src="{{asset('storage/'.$model->images)}}" alt="" style="width: 100px">
                                @if($errors->has('images'))
                                    <p class="text-danger">{{$errors->first('images')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="price">Giá</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{$model->price}}">
                                @if($errors->has('price'))
                                    <p class="text-danger">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-group col">
                                <label for="category">Loại sản phẩm</label>
                                <select name="cat_id" id="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$model->cat_id == $category->id ? 'selected' : ''}}>{{$category->cat_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
