@extends('layouts.admin')
@section('title', 'Cập nhật Slider')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Cập nhật Slider</h3>
        </div>
      <div class="card-body">
        {{-- <h4 class="card-title">Basic form elements</h4> --}
        {{-- <p class="card-description">
        </p> --}}
        <form action="{{route('slider.update', ['id'=>$slider->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="exampleInputName1">Tiêu đề</label>
                <input type="text" class="form-control" id="exampleInputName1" name="slider_title" value="{{ $slider->slider_title }}">
                <span class="text-danger">@error('slider_title'){{ $message }}@enderror</span>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Phụ đề 1</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="slider_subtitle1" value="{{ $slider->slider_subtitle1 }}">
                  <span class="text-danger">@error('slider_subtitle1'){{ $message }}@enderror</span>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="exampleInputName1">Phụ đề 2</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="slider_subtitle2" value="{{ $slider->slider_subtitle2 }}">
                    <span class="text-danger">@error('slider_subtitle2'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Phụ đề 3</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="slider_subtitle3" value="{{ $slider->slider_subtitle3 }}">
                  <span class="text-danger">@error('slider_subtitle3'){{ $message }}@enderror</span>
              </div>

              <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Phụ đề 4</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="slider_subtitle4" value="{{ $slider->slider_subtitle4 }}">
                  <span class="text-danger">@error('slider_subtitle4'){{ $message }}@enderror</span>
              </div>
          </div>

           <div class="form-group">
                <label for="exampleTextarea1">Hình cũ</label>
                <br />
                @if ($slider->slider_image)
                    <img src="{{asset('uploads/sliderImg/'.$slider->slider_image)}}" alt="sliderImg" style="width: 36px; height: 36px; border-radius: 100%" />
                @else
                    <span>Không tìm thấy!</span>
                @endif
           </div>
          <div class="form-group">
            <label>Hình mới</label>
            <input type="file" class="form-control" name="slider_image">
          </div>
          <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
          <a href="{{route('slider.index')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection