@extends('layouts.admin')
@section('title', 'Cập nhật danh mục')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Chỉnh sửa danh mục</h5>
        </div>
      <div class="card-body">
        <form action="{{route('category.update', ['id'=>$category->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group">
              <label for="exampleInputName1">Tên danh mục</label>
              <input type="text" class="form-control" id="exampleInputName1" name="cate_name" value="{{ $category->cate_name }}">
              <span class="text-danger">@error('cate_name'){{ $message }}@enderror</span>
            </div>
           <div class="form-group">
                <label for="exampleTextarea1">Hình cũ</label>
                <br />
                @if ($category->cate_image)
                    <img src="{{asset('uploads/cateImg/'.$category->cate_image)}}" alt="imgCategory" style="width: 36px; height: 36px; border-radius: 100%"/>
                @else
                    <span>Không tìm thấy!</span>
                @endif
           </div>
          <div class="form-group">
            <label>Hình mới</label>
            <input type="file" class="form-control" name="cate_image">
          </div>
          <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
          <a href="{{route('category.index')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection