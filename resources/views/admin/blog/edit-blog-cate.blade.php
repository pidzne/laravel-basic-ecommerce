@extends('layouts.admin')
@section('title', 'Cập nhật danh mục bài viết')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Cập nhật danh mục bài viết</h5>
        </div>
      <div class="card-body">
          <form action="{{route('blog_cate.update', ['id'=>$blogCate->id])}}" class="forms-sample" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleInputName1">Tên danh mục bài viết</label>
              <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $blogCate->blog_cate_name }}">
              <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
             
            <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
            <a href="{{route('blog_cate.index')}}" class="btn btn-light">Hủy</a>
          </form>
      </div>
    </div>
  </div>
@endsection