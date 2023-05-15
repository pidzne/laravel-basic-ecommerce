@extends('layouts.admin')
@section('title', 'Danh sách danh mục bài viết')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('blog_cate.create')}}" class="btn btn-success">Thêm</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Tên danh mục bài viết</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blogCate as $value)
                  <tr>
                      <td class="align-middle">{{ $value->id }}</td>
                      <td class="align-middle">{{ $value->blog_cate_name }}</td>
                      <td class="align-middle">
                        @if ($value->blog_cate_status==0)
                          <a class="btn btn-outline-secondary" href="{{route('blog_cate.unactive', ['id'=>$value->id])}}">
                            <span class="mdi mdi-eye"></span>  
                          </a>
                        @else
                          <a class="btn btn-outline-secondary" href="{{route('blog_cate.active', ['id'=>$value->id])}}">
                            <span class="mdi mdi-eye-off"></span> 
                          </a>
                        @endif
                      </td>
                      <td class="align-middle">
                          <a href="{{route('blog_cate.edit', ['id'=>$value->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                          <a href="{{route('blog_cate.destroy', ['id'=>$value->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                      </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection