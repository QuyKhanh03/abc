@section('title','Kiên Nguyễn | Trang chủ')
@extends('admin.master')
@section('main-content')
    <!-- page content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <h3>Thêm danh mục</h3>
                    </div>
                    <div class="col float-end">
                        <a href="{{route('categories.index')}}" class="btn btn-primary ">Danh sách</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên danh mục</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="cat_name">
                                @if($errors->has('cat_name'))
                                    <p class="text-danger">{{$errors->first('cat_name')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
