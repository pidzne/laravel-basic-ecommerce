@extends('layouts.admin')
@section('title', 'Thêm mới bài viết')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Thêm mới bài viết</h5>
        </div>
      <div class="card-body">
        <form action="{{route('blog.store')}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlSelect1">Danh mục</label>
              <select class="form-control" id="exampleFormControlSelect1" name="blog_cate_id" value="{{ old('blog_cate_id') }}">    
                <option value="">Chọn một danh mục bài viết</option>
                @foreach ($blogCate as $blCate)
                  <option value="{{$blCate->id}}">{{$blCate->blog_cate_name ?? ""}}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('blog_cate_id'){{ $message }}@enderror</span>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="exampleInputName1">Tiêu đề</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên tiêu đề cho bài viết" name="title" value="{{ old('title') }}">
              <span class="text-danger">@error('title'){{ $message }}@enderror</span>
            </div>

            <div class="col-md-6 mb-3">
              <label for="exampleInputName1">Hashtag</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền hashtag cho bài viết" name="hashtag" value="{{ old('hashtag') }}">
              <span class="text-danger">@error('hashtag'){{ $message }}@enderror</span>
            </div>
          </div>
         
          <div class="form-group">
            <label for="exampleInputName1">Nội dung bài viết</label>
            <textarea class="form-control" rows="10" placeholder="Điền nội dung cho bài viết" name="content">{{ old('content') }}</textarea>
            <span class="text-danger">@error('content'){{ $message }}@enderror</span>
          </div>

          <div class="form-group">
              <label for="exampleInputName1">Tác giả</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên tác giả" name="author" value="{{ Auth::user()->name }}">
              <span class="text-danger">@error('author'){{ $message }}@enderror</span>
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Nguồn bài viết (nếu có)</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền nguồn cho bài viết" name="link" value="{{ old('link') }}">
            <span class="text-danger">@error('link'){{ $message }}@enderror</span>
          </div>
          
          <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" name="blog_image">
            <span class="text-danger">@error('blog_image'){{ $message }}@enderror</span>
          </div>
          <button type="submit" class="btn btn-primary me-2">Gửi</button>
          <a href="{{route('blog.index')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection