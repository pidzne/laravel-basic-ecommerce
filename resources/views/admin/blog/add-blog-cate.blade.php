@extends('layouts.admin')
@section('title', 'Thêm mới danh mục bài viết')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Thêm mới danh mục bài viết</h5>
        </div>
      <div class="card-body">
        <form action="{{route('blog_cate.store')}}" class="forms-sample" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Tên danh mục bài viết</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên danh mục bài viết" name="name" value="{{ old('name') }}">
            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
          </div>
          
          <button type="submit" class="btn btn-primary me-2">Gửi</button>
          <a href="{{route('blog_cate.index')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection