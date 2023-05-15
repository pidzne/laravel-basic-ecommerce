@extends('layouts.admin')
@section('title', 'Danh sách danh mục')
@section('css')
  <style>
    .table td img {
      border-radius: 0;
    }
  </style>
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('category.create')}}" class="btn btn-success">Thêm</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên danh mục</th>
                <th>Ngày thêm</th>
                <th>Trạng thái</th>
                <th colspan="2">Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($category as $cate)
                    <tr>
                        <td class="align-middle">{{ $cate->id }}</td>
                        <td class="align-middle">
                          <img src="{{asset('uploads/cateImg/'.$cate->cate_image)}}" alt="imgCategory"/>
                        </td>
                        <td class="align-middle">{{ $cate->cate_name }}</td>
                        <td class="align-middle">{{ $cate->created_at ? date('d-m-Y', strtotime($cate->created_at)) : '-' }}</td>
                        <td class="align-middle">
                            @if ($cate->cate_status==0)
                              <a class="btn btn-outline-secondary" href="{{route('category.unactive', ['id'=>$cate->id])}}">
                                <span class="mdi mdi-eye"></span>  
                              </a>
                            @else
                              <a class="btn btn-outline-secondary" href="{{route('category.active', ['id'=>$cate->id])}}">
                                <span class="mdi mdi-eye-off"></span> 
                              </a>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{route('category.edit', ['id'=>$cate->id])}}" class="btn btn-primary" style="margin-right: 0px">Sửa</a>
                            <a href="{{route('category.destroy', ['id'=>$cate->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a> 
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="">
          {{ $category->links() }}
      </div>
      </div>
    </div>
</div>
@endsection