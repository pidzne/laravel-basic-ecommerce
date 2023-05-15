@extends('layouts.admin')
@section('title', 'Danh mục sản phẩm')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('product.create')}}" class="btn btn-success">Thêm</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($product as $prod)
                    <tr>
                        <td class="align-middle">{{ $prod->id}}</td>
                        <td class="align-middle">
                          <img src="{{asset('uploads/prodImg/'.$prod->prod_image)}}" alt="imgProduct"/>
                       </td>
                        <td class="align-middle">{{ $prod->prod_name }}</td>
                        <td class="align-middle">{{ $prod->category->cate_name }}</td>
                        <td class="align-middle">{{ $prod->brand->brand_name }}</td>
                       <td class="align-middle">
                          @if ($prod->prod_status==0)
                            <a class="btn btn-outline-secondary" href="{{route('product.unactive', ['id'=>$prod->id])}}">
                              <span class="mdi mdi-eye"></span>  
                            </a>
                          @else
                            <a class="btn btn-outline-secondary" href="{{route('product.active', ['id'=>$prod->id])}}">
                              <span class="mdi mdi-eye-off"></span> 
                            </a>
                          @endif
                       </td>
                        <td class="align-middle">
                            <a href="{{route('color.index', ['id' => $prod->id])}}" class="btn btn-info" style="margin-right: 10px">Màu</a>
                            <a href="{{route('size.index', ['id' => $prod->id])}}" class="btn btn-secondary" style="margin-right: 10px">Size</a>
                            <a href="{{route('album.index', ['id'=>$prod->id])}}" class="btn btn-warning" style="margin-right: 10px">Album</a>
                            <a href="{{route('product.edit', ['id'=>$prod->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                            <a href="{{route('product.destroy', ['id'=>$prod->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          {{ $product->links() }}
        </div>
      </div>
    </div>
</div>
@endsection