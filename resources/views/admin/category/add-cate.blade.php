@extends('layouts.admin')
@section('title', 'Thêm danh mục')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Thêm mới danh mục</h5>
        </div>
      <div class="card-body">
        <form action="{{route('category.store')}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
            <div class="form-group">
              <label for="exampleInputName1">Tên danh mục</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên danh mục" name="cate_name" value="{{ old('cate_name') }}">
              <span class="text-danger">@error('cate_name'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
              <label>Hình ảnh</label>
              <input type="file" class="form-control" name="cate_image">
              <span class="text-danger">@error('cate_image'){{ $message }}@enderror</span>
            </div>
          <button type="submit" class="btn btn-primary me-2">Gửi</button>
          <a href="{{route('category.index')}}" class="btn btn-secondary">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection