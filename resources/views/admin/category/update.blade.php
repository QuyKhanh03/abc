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
                    <form action="{{route('categories.update', $model->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên danh mục</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="cat_name" value="{{ $model->cat_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $model->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $model->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
