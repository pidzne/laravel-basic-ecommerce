@extends('layouts.admin')
@section('title', 'Cập nhật Album')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Cập nhật Album</h3>
        </div>
      <div class="card-body">
        <form action="{{route('album.update', ['id'=>$album->id])}}" class="forms-sample" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="exampleTextarea1">Hình cũ</label>
            <br />
            @if ($album->album_image)
                <img src="{{asset('uploads/albumImg/'.$album->album_image)}}" alt="imgProduct" style="width: 36px; height: 36px; border-radius: 100%"/>
            @else
                <span>Không tìm thấy!</span>
            @endif
          </div>

          <div class="form-group" >
            <label>Hình mới</label>
            <input type="file" name="album_image" value="{{ $album->album_image }}" class="form-control">
            <span class="text-danger">@error('album_image'){{ $message }}@enderror</span>
          </div>
          <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
          <a href="{{route('album.index', ['id'=>$prod_id_select->id])}}" class="btn btn-secondary">Hủy</a>
        </form>
      </div>
    </div>
  </div>
@endsection
