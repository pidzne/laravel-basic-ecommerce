@extends('layouts.admin')
@section('title', 'Thêm mới thương hiệu')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Thêm mới thương hiệu</h3>
        </div>
      <div class="card-body">
        <form action="{{route('brand.store')}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Tên thương hiệu</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên thương hiệu" name="brand_name" value="{{ old('brand_name') }}">
            <span class="text-danger">@error('brand_name'){{ $message }}@enderror</span>
          </div>
          
          <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" name="brand_image">
            <span class="text-danger">@error('brand_image'){{ $message }}@enderror</span>
          </div>
          <button type="submit" class="btn btn-primary me-2">Gửi</button>
          <a href="{{route('brand.index')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection