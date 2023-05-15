@extends('layouts.admin')
@section('title', 'Danh sách bình luận')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách bình luận</h4>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center mb-3">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Tên người bình luận</th>
                <th>Nội dung bình luận</th>
                <th>Đánh giá sao</th>
                <th>Hành dộng</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comm)
                    <tr>
                        <td class="align-middle">{{ $comm->id }}</td>
                        <td class="align-middle">{{ $comm->prodName}}</td>
                        <td class="align-middle">{{ $comm->userName}}</td>
                        <td class="align-middle">{{ $comm->content}}</td>
                        <td class="align-middle">
                            @if ($comm->rating=='5')
                                <span>5 sao</span>
                            @elseif ($comm->rating=='4')
                                <span>4 sao</span>
                            @elseif ($comm->rating=='3')
                                <span>3 sao</span>
                            @elseif ($comm->rating=='2')
                                <span>2 sao</span>
                            @else
                                <span>1 sao</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($comm->status==0)
                              <a class="btn btn-outline-secondary" href="{{route('comment.unactive', ['id'=>$comm->id])}}">
                                <span class="mdi mdi-eye"></span>  
                              </a>
                            @else
                              <a class="btn btn-outline-secondary" href="{{route('comment.active', ['id'=>$comm->id])}}">
                                <span class="mdi mdi-eye-off"></span> 
                              </a>
                            @endif
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="">
            {{ $comments->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection