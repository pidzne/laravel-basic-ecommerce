@extends('layouts.admin')
@section('title', 'Danh sách thương hiệu')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('brand.create')}}" class="btn btn-success">Thêm</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên thương hiệu</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($brand as $br)
                    <tr>
                        <td class="align-middle">{{ $br->id }}</td>
                        <td class="align-middle">
                          <img src="{{asset('uploads/brandImg/'.$br->brand_image)}}" alt="brandImg"/>
                       </td>
                        <td class="align-middle">{{ $br->brand_name }}</td>
                        <td class="align-middle">
                          @if ($br->brand_status==0)
                            <a class="btn btn-outline-secondary" href="{{route('brand.unactive', ['id'=>$br->id])}}">
                              <span class="mdi mdi-eye"></span>  
                            </a>
                          @else
                            <a class="btn btn-outline-secondary" href="{{route('brand.active', ['id'=>$br->id])}}">
                              <span class="mdi mdi-eye-off"></span> 
                            </a>
                          @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{route('brand.edit', ['id'=>$br->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                            <a href="{{route('brand.destroy', ['id'=>$br->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
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