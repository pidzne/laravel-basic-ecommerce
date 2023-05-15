@extends('layouts.admin')
@section('title', 'Danh sách bài viết')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('blog.create')}}" class="btn btn-success">Thêm</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blog as $index => $value)
                    <tr>
                        <td class="align-middle">{{ $value->id }}</td>
                        <td class="align-middle">{{ $value->title }}</td>
                        <td class="align-middle">{{ $value->author }}</td>
                        <td class="align-middle">
                          @if ($value->blog_status==0)
                            <a class="btn btn-outline-secondary" href="{{route('blog.unactive', ['id'=>$value->id])}}">
                              <span class="mdi mdi-eye"></span>  
                            </a>
                          @else
                            <a class="btn btn-outline-secondary" href="{{route('blog.active', ['id'=>$value->id])}}">
                              <span class="mdi mdi-eye-off"></span> 
                            </a>
                          @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{route('blog.edit', ['id'=>$value->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                            <a href="{{route('blog.destroy', ['id'=>$value->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
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