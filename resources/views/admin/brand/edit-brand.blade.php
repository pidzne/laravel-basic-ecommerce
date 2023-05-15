@extends('layouts.admin')
@section('title', 'Cập nhật thương hiệu')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Cập nhật thương hiệu</h3>
        </div>
      <div class="card-body">
          <form action="{{route('brand.update', ['id'=>$brand->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleInputName1">Tên thương hiệu</label>
              <input type="text" class="form-control" id="exampleInputName1" name="brand_name" value="{{ $brand->brand_name }}">
              <span class="text-danger">@error('brand_name'){{ $message }}@enderror</span>
            </div>
             
            <div class="form-group">
              <label for="exampleTextarea1">Hình cũ</label>
              <br />
              @if ($brand->brand_image)
                <img src="{{asset('uploads/brandImg/'.$brand->brand_image)}}" alt="brandImg" style="width: 36px; height:36px; border-radius: 100%">
              @else
                  <span>Không tìm thấy!</span>
              @endif
            </div>

            <div class="form-group">
              <label>Hình ảnh</label>
              <input type="file" class="form-control" name="brand_image">
            </div>
            <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
            <a href="{{route('brand.index')}}" class="btn btn-light">Hủy</a>
          </form>
      </div>
    </div>
  </div>
@endsection