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
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm biến thể màu sắc</h4>
            <form action="{{ route('') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Giá sản phẩm</label>
                        <input type="number" class="form-control" id="exampleInputName1" name="price_color">
                        <span class="text-danger">@error('prod_original_price'){{ $message }}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Màu sắc</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="color">
                        <span class="text-danger">@error('prod_selling_price'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Hình ảnh</label>
                    <input type="file" name="image_color_variant" class="form-control">
                    <span class="text-danger">@error('prod_image'){{ $message }}@enderror</span>
                </div>

                <input type="hidden" name="id" value="{{ $product->id }}">
    
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                </div>
            </form>  
            </div>
        </div>
      </div>


      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm biến thể kích cỡ</h4>
            <form action="{{ route('addSizeVariants') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Kích cỡ</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="size">
                        <span class="text-danger">@error('prod_original_price'){{ $message }}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Cân nặng</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="weight">
                        <span class="text-danger">@error('prod_selling_price'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Giá sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="price_size">
                    <span class="text-danger">@error('prod_image'){{ $message }}@enderror</span>
                </div>

                <input type="hidden" name="id" value="{{ $product->id }}">
    
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                </div>
            </form>  
            </div>
        </div>
      </div>
</div>
@endsection