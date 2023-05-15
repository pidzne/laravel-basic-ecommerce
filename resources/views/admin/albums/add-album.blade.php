@extends('layouts.admin')
@section('title', 'Thêm mới Album')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Thêm mới Album</h3>
        </div>
      <div class="card-body">
        <form action="{{route('album.store', ['prod_id'=>$product->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group" >
            <label>Hình ảnh</label>
            <input type="file" name="album_image" class="form-control">
            <span class="text-danger">@error('album_image'){{ $message }}@enderror</span>
          </div>
          <button type="submit" class="btn btn-success me-2">Gửi</button>
          <a href="{{route('album.index', ['id'=>$product->id])}}" class="btn btn-secondary">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection
