@extends('layouts.admin')
@section('css')
    <style>
        #imgStyle {
            width: 60%;
            height: 60%;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm màu sắc cho sản phẩm</h4>
            <form action="{{ route('color.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Tên màu sắc</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="color">
                    <span class="text-danger">@error('color'){{ $message }}@enderror</span>
                </div>

                <input type="hidden" name="prod_id_hidden" value="{{ $product->id }}">
    
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                    </div>

                    <div class="col-md-6 mb-3">
                        <a href="{{route('product.index')}}" class="btn btn-secondary btn-block">Hủy</a>
                    </div>
                </div>
                    
            </form>  
            <div class="table-responsive pt-3">
                <h4 class="card-title">Danh sách màu sắc sản phẩm</h4>
              <table class="table table-bordered text-center">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Tên màu sắc</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($prod_color as $index => $color)
                        <tr>
                            <td class="align-middle">{{ $color->$index = $index + 1}}</td>
                            <td class="align-middle">{{ $color->color }}</td>
                            <td class="align-middle">
                                <a href="{{route('color.destroy', ['id'=>$color->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                            </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
    </div>

</div>
@endsection