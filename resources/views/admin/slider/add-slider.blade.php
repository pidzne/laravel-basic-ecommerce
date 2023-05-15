@extends('layouts.admin')
@section('title', 'Thêm mới Slider')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Thêm mới slider</h3>
        </div>
      <div class="card-body">
        <form action="{{route('slider.store')}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
            <div class="form-group">
              <label for="exampleInputName1">Tiêu đề</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên tiêu đề" name="slider_title" value="{{ old('slider_title') }}">
              <span class="text-danger">@error('slider_title'){{ $message }}@enderror</span>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exampleInputName1">Phụ đề 1</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên phụ đề 1" name="slider_subtitle1" value="{{ old('slider_subtitle1') }}">
                    <span class="text-danger">@error('slider_subtitle1'){{ $message }}@enderror</span>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Phụ đề 2</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên phụ đề 2" name="slider_subtitle2" value="{{ old('slider_subtitle2') }}">
                  <span class="text-danger">@error('slider_subtitle2'){{ $message }}@enderror</span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Phụ đề 3</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên phụ đề 3" name="slider_subtitle3" value="{{ old('slider_subtitle3') }}">
                  <span class="text-danger">@error('slider_subtitle3'){{ $message }}@enderror</span>
              </div>

              <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Phụ đề 4</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên phụ đề 4" name="slider_subtitle4" value="{{ old('slider_subtitle4') }}">
                  <span class="text-danger">@error('slider_subtitle4'){{ $message }}@enderror</span>
              </div>
          </div>
          
          <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" name="slider_image">
            <span class="text-danger">@error('slider_image'){{ $message }}@enderror</span>
          </div>
          <button type="submit" class="btn btn-primary me-2">Gửi</button>
          <a href="{{route('slider.index')}}" class="btn btn-secondary">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection