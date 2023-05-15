@extends('layouts.admin')
@section('title', 'Danh sách Slider')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{route('slider.create')}}" class="btn btn-success">Thêm</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Phụ đề 1</th>
                <th>Phụ đề 2</th>
                <th>Phụ đề 3</th>
                <th>Phụ đề 4</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($slider as $index => $sli)
                    <tr>
                        <td class="align-middle">{{ $sli->$index = $index + 1 }}</td>
                        <td class="align-middle">
                          <img src="{{asset('uploads/sliderImg/'.$sli->slider_image)}}" alt="sliderImg"/>
                        </td>
                        <td class="align-middle">{{ $sli->slider_title }}</td>
                        <td class="align-middle">{{ $sli->slider_subtitle1 }}</td>
                        <td class="align-middle">{{ $sli->slider_subtitle2 }}</td>
                        <td class="align-middle">{{ $sli->slider_subtitle3 }}</td>
                        <td class="align-middle">{{ $sli->slider_subtitle4 }}</td>
                        <td class="align-middle">
                            @if ($sli->slider_status==0)
                              <a class="btn btn-outline-secondary" href="{{route('slider.unactive', ['id'=>$sli->id])}}">
                                <span class="mdi mdi-eye"></span>  
                              </a>
                            @else
                              <a class="btn btn-outline-secondary" href="{{route('slider.active', ['id'=>$sli->id])}}">
                                <span class="mdi mdi-eye-off"></span> 
                              </a>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{route('slider.edit', ['id'=>$sli->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                            <a href="{{route('slider.destroy', ['id'=>$sli->id])}}" class="btn btn-danger">Xóa</a>
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="">
          {{ $slider->links() }}
      </div>
      </div>
    </div>
</div>
@endsection