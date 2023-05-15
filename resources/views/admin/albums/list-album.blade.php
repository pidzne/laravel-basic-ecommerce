@extends('layouts.admin')
@section('title', 'Danh sách Album')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('product.index')}}" class="btn btn-secondary">Quay lại</a>
        <a href="{{route('album.create', ['prod_id'=>$product->id])}}" class="btn btn-success" style="margin-right: 10px">Thêm</a>
        <h4 class="card-title mt-3" id="tag">Danh sách album</h4>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($album as $index => $albumall)
                    <tr>
                        <td class="align-middle">{{ $album->$index=$index+1 }}</td>
                        <td class="align-middle"><img src="{{ asset('uploads/albumImg/'.$albumall->album_image) }}" alt=""></td>
                        <td class="align-middle">
                          @if ($albumall->album_status==0)
                              <a class="btn btn-outline-secondary" href="{{route('album.unactive', ['id'=>$albumall->id])}}">
                                <span class="mdi mdi-eye"></span>  
                              </a>
                            @else
                              <a class="btn btn-outline-secondary" href="{{route('album.active', ['id'=>$albumall->id])}}">
                                <span class="mdi mdi-eye-off"></span> 
                              </a>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{route('album.edit', ['id'=>$albumall->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                            <a href="{{route('album.destroy', ['id'=>$albumall->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
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
