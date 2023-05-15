@extends('layouts.admin')
@section('title', 'Cập nhật bài viết')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Cập nhật bài viết</h5>
        </div>
      <div class="card-body">
          <form action="{{route('blog.update', ['id'=>$blog->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleFormControlSelect1">Danh mục bài viết</label>
                <select class="form-control" id="exampleFormControlSelect1" name="blog_cate_id">
                  @foreach($blogCate as $blCate)
                    @if($blCate->id === $blog->blog_cate_id) 
                      <option value="{{$blCate->id}}" selected>{{$blCate->blog_cate_name ?? ""}}</option>
                    @else
                      <option value="{{$blCate->id}}">{{$blCate->blog_cate_name ?? ""}}</option>
                    @endif
                  @endforeach
                </select>
                <span class="text-danger">@error('blog_cate_id'){{ $message }}@enderror</span>
            </div>
  
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="exampleInputName1">Tiêu đề</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên tiêu đề cho bài viết" name="title" value="{{ $blog->title }}">
                <span class="text-danger">@error('title'){{ $message }}@enderror</span>
              </div>
  
              <div class="col-md-6 mb-3">
                <label for="exampleInputName1">Hashtag</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền hashtag cho bài viết" name="hashtag" value="{{ $blog->hashtag }}">
                <span class="text-danger">@error('hashtag'){{ $message }}@enderror</span>
              </div>
            </div>
           
            <div class="form-group">
              <label for="exampleInputName1">Nội dung bài viết</label>
              <textarea class="form-control" rows="10" placeholder="Điền nội dung cho bài viết" name="content">{{ $blog->content }}</textarea>
              <span class="text-danger">@error('content'){{ $message }}@enderror</span>
            </div>
  
            <div class="form-group">
                <label for="exampleInputName1">Tác giả</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên tác giả" name="author" value="{{ $blog->author }}">
                <span class="text-danger">@error('author'){{ $message }}@enderror</span>
            </div>
  
            <div class="form-group">
              <label for="exampleInputName1">Nguồn bài viết (nếu có)</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền nguồn cho bài viết" name="link" value="{{ $blog->link }}">
              <span class="text-danger">@error('link'){{ $message }}@enderror</span>
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Hình cũ</label>
              <br />
              @if ($blog->blog_image)
                <img src="{{asset('uploads/blogImg/'.$blog->blog_image)}}" alt="blogImg" style="width: 36px; height:36px; border-radius: 100%">
              @else
                  <span>Không tìm thấy!</span>
              @endif
            </div>
            
            <div class="form-group">
              <label>Hình ảnh</label>
              <input type="file" class="form-control" name="blog_image">
              <span class="text-danger">@error('blog_image'){{ $message }}@enderror</span>
            </div>
             
            <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
            <a href="{{ route('blog.index') }}" class="btn btn-light">Hủy</a>
          </form>
      </div>
    </div>
  </div>
@endsection