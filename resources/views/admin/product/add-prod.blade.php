@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('css')

@endsection
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Thêm mới sản phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{route('product.store')}}" class="forms-sample" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Điền tên sản phẩm" name="prod_name" value="{{ old('prod_name') }}">
                        <span class="text-danger">@error('prod_name'){{ $message }}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="exampleFormControlSelect1">Danh mục</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="cate_id" value="{{ old('cate_id') }}">    
                          <option value="">Chọn một danh mục</option>
                          @foreach ($category as $cate)
                          <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                          @endforeach
                      </select>
                      <span class="text-danger">@error('cate_id'){{ $message }}@enderror</span>
                    </div>
                </div>


                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="exampleInputName1">Thương hiệu</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                        <option value="">Chọn một thương hiệu</option>
                        @foreach ($brand as $br)
                            <option value="{{$br->id}}">{{$br->brand_name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('brand_id'){{ $message }}@enderror</span>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="exampleInputName1">Số lượng</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="prod_quantity" value="{{ old('prod_quantity') }}" placeholder="Điền số lượng">
                    <span class="text-danger">@error('prod_quantity'){{ $message }}@enderror</span>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="prod_original_price" value="{{ old('prod_original_price') }}" placeholder="Điền giá gốc">
                        <span class="text-danger">@error('prod_original_price'){{ $message }}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputName1">Mức giảm giá (%)</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="prod_selling_price" value="{{ old('prod_selling_price') }}" placeholder="Điền % giảm giá">
                        <span class="text-danger">@error('prod_selling_price'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Mô tả ngắn</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="prod_small_description" value="{{ old('prod_small_description') }}" placeholder="Điền mô tả ngắn">
                    <span class="text-danger">@error('prod_small_description'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả chi tiết</label>
                    <textarea class="form-control" id="editor123" rows="10" name="prod_detail_description">{{ old('prod_detail_description') }}</textarea>
                    <span class="text-danger">@error('prod_detail_description'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Top Selling</label>
                    <input type="checkbox" name="prod_top_selling">
                </div>

                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="prod_image">
                    <span class="text-danger">@error('prod_image'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <p>    
                      <a class="btn btn-secondary col-sm-3" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="margin-right: 1%">Thông tin chi tiết</a>
                    </p>
                   
                    <!-- Thêm thông tin chi tiết -->
                    <div class="row">
                      <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                          {{-- <br> --}}
                          {{-- <h4 class="card-title">
                            <a class="col-sm-3" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="margin-right: 1%">Thêm biến thể kích cỡ</a>
                          <hr></h4> --}}
                          <div class="card card-body">
                            <div class="row">
                              <div class="col-md-6 mb-3">
                                  <label for="exampleInputName1">Phong cách</label>
                                  <input type="text" class="form-control" id="exampleInputName1" name="clo_style" value="{{ old('clo_style') }}" placeholder="Điền phong cách">
                                  <span class="text-danger">@error('clo_style'){{ $message }}@enderror</span>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="exampleInputName1">Chất liệu</label>
                                  <input type="text" class="form-control" id="exampleInputName1" name="clo_material" value="{{ old('clo_material') }}" placeholder="Điền chất liệu">
                                  <span class="text-danger">@error('clo_material'){{ $message }}@enderror</span>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-3">
                                  <label for="exampleInputName1">Xuất xứ</label>
                                  <input type="text" class="form-control" id="exampleInputName1" name="clo_origin" value="{{ old('clo_origin') }}" placeholder="Điền xuất xứ">
                                  <span class="text-danger">@error('clo_origin'){{ $message }}@enderror</span>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="exampleInputName1">Kiểu quần, áo</label>
                                  <input type="text" class="form-control" id="exampleInputName1" name="clo_type" value="{{ old('clo_type') }}" placeholder="Điền kiểu quần, áo">
                                  <span class="text-danger">@error('clo_type'){{ $message }}@enderror</span>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-3">
                                  <label>Loại quần, áo</label>
                                  <input type="text" class="form-control" name="clo_cate_prod" value="{{ old('clo_cate_prod') }}" placeholder="Điền loại quần, áo">
                                  <span class="text-danger">@error('clo_cate_prod'){{ $message }}@enderror</span>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="exampleInputName1">Mẫu quần, áo</label>
                                  <input type="text" class="form-control" id="exampleInputName1" name="clo_model" value="{{ old('clo_model') }}" placeholder="Điền mẫu quần, áo">
                                  <span class="text-danger">@error('clo_model'){{ $message }}@enderror</span>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
    
                </div>

                <button type="submit" class="btn btn-primary me-2">Gửi</button>
                <a href="{{route('product.index')}}" class="btn btn-light">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection