@extends('layouts.admin')
@section('title', 'Cập nhật đơn hàng')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật trạng thái đơn hàng</h4> 
            <form action="{{route('order_admin.update', ['id'=>$orders->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label>Trạng thái mặc định</label>
                  <select class="form-control" disabled>
                    <option value="0" {{$orders->order_status == 0 ? 'selected' : ''}}>Đang chờ xử lý</option>
                    <option value="1" {{$orders->order_status == 1 ? 'selected' : ''}}>Đang lấy hàng</option>
                    <option value="2" {{$orders->order_status == 2 ? 'selected' : ''}}>Đang giao hàng</option>
                    <option value="3" {{$orders->order_status == 3 ? 'selected' : ''}}>Đã giao hàng</option>
                  </select>
                </div>
                <div class="form-group">
                <label>Trạng thái mới</label>
                <br />
                <select name="order_status" class="btn btn-primary">
                    <option value="0">Đang chờ xử lý</option>
                    <option value="1">Đang lấy hàng</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3">Đã giao hàng</option>
                </select>
                </div>
                <button type="submit" class="btn btn-success">Thay đổi</button>
                <a href="{{ route('order_admin.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
      </div>
    </div>
  </div>
</div>

@endsection