@extends('layouts.admin')
@section('title', 'Cập nhật sản phẩm')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Cập nhật sản phẩm</h5>
        </div>
      <div class="card-body">
        <form action="{{route('product.update', ['id'=>$product->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exampleInputName1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputName1"  name="prod_name" value="{{$product->prod_name}}">
                    <span class="text-danger">@error('prod_name'){{ $message }}@enderror</span>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="exampleFormControlSelect1">Danh mục</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="cate_id">
                    @foreach($category as $cate)
                      @if($cate->id === $product->cate_id) 
                        <option value="{{$cate->id}}" selected>{{$cate->cate_name}}</option>
                      @else
                        <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                      @endif
                    @endforeach
                  </select>
                  <span class="text-danger">@error('cate_id'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="exampleInputName1">Thương hiệu</label>
                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                  @foreach($brand as $br)
                      <option value="{{$br->id}}" @if($br->id === $product->br_id) 'selected' @endif>{{$br->brand_name}}</option>
                   @endforeach
                </select>
                <span class="text-danger">@error('brand_id'){{ $message }}@enderror</span>
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="exampleInputName1">Số lượng</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên danh mục" name="prod_quantity" value="{{$product->prod_quantity}}">
                <span class="text-danger">@error('prod_quantity'){{ $message }}@enderror</span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="exampleInputName1">Giá sản phẩm</label>
                  <input type="text" class="form-control" id="exampleInputName1"  name="prod_original_price" value="{{$product->prod_original_price}}">
                  <span class="text-danger">@error('prod_original_price'){{ $message }}@enderror</span>
                </div>
              <div class="col-md-6 mb-3">
                <label for="exampleInputName1">Mức giảm giá (%)</label>
                <input type="text" class="form-control" id="exampleInputName1"  name="prod_selling_price" value="{{$product->prod_selling_price}}">
                <span class="text-danger">@error('prod_selling_price'){{ $message }}@enderror</span>
              </div>
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Mô tả ngắn</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên danh mục" name="prod_small_description" value="{{$product->prod_small_description}}">
                <span class="text-danger">@error('prod_small_description'){{ $message }}@enderror</span>
              </div>
            <div class="form-group">
                <label for="exampleTextarea1">Mô tả chi tiết</label>
                <textarea class="form-control" id="editor123" rows="10" placeholder="Điền mô tả" name="prod_detail_description">{{$product->prod_detail_description}}</textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputName1">Top Selling</label>
              <input type="checkbox" name="prod_top_selling" {{$product->prod_top_selling=='1'?'checked':''}}>
              <span class="text-danger">@error('prod_top_selling'){{ $message }}@enderror</span>
            </div>

        <div class="form-group">
          <label for="exampleTextarea1">Hình cũ</label>
          <br />
          @if ($product->prod_image)
              <img src="{{asset('uploads/prodImg/'.$product->prod_image)}}" alt="imgProduct" style="width: 36px; height: 36px; border-radius: 100%"/>
          @else
              <span>Không tìm thấy!</span>
          @endif
        </div>
          
        <div class="form-group">
          <label>Hình mới</label>
          <input type="file" class="form-control" name="prod_image">
        </div>

        <div class="form-group">
            <p>    
              <a class="btn btn-secondary col-sm-3" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="margin-right: 1%">Thông tin chi tiết</a>
            </p>
           
            <!-- Thông tin chi tiết -->
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                  <div class="card card-body">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="exampleInputName1">Phong cách</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="clo_style" value="{{ $prod_detail->clo_style ?? "" }}">
                          <span class="text-danger">@error('clo_style'){{ $message }}@enderror</span>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="exampleInputName1">Chất liệu</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="clo_material" value="{{ $prod_detail->clo_material ?? "" }}">
                          <span class="text-danger">@error('clo_material'){{ $message }}@enderror</span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="exampleInputName1">Xuất xứ</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="clo_origin" value="{{ $prod_detail->clo_origin ?? "" }}">
                          <span class="text-danger">@error('clo_origin'){{ $message }}@enderror</span>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="exampleInputName1">Kiểu quần, áo</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="clo_type" value="{{ $prod_detail->clo_type ?? "" }}">
                          <span class="text-danger">@error('clo_type'){{ $message }}@enderror</span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                          <label>Loại quần, áo</label>
                          <input type="text" class="form-control" name="clo_cate_prod" value="{{ $prod_detail->clo_cate ?? "" }}">
                          <span class="text-danger">@error('clo_cate_prod'){{ $message }}@enderror</span>
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="exampleInputName1">Mẫu quần, áo</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="clo_model" value="{{ $prod_detail->clo_model ?? "" }}">
                          <span class="text-danger">@error('clo_model'){{ $message }}@enderror</span>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
        </div>

          <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
          <a href="{{route('product.index')}}" class="btn btn-light">Hủy</a>
        </form>
      </div>
      </div>
</div>
@endsection