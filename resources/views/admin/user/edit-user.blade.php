@extends('layouts.admin')
@section('title', 'Cập nhật tài khoản')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật vai trò</h4> 
            <form action="{{route('user_admin.update', ['id'=>$users->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label>Vai trò hiện tại</label>
                  <select class="form-control" disabled style="color: #000">
                    <option value="0" {{$users->role == 0 ? 'selected' : ''}}>Người dùng</option>
                    <option value="1" {{$users->role == 1 ? 'selected' : ''}}>Quản trị viên</option>
                  </select>
                </div>
                <div class="form-group">
                <label>Vai trò mới</label>
                <br />
                <select name="role" class="btn btn-primary">
                    <option value="0">Người dùng</option>
                    <option value="1">Quản trị viên</option>
                </select>
                </div>
                <button type="submit" class="btn btn-success mr-2">Thay đổi</button>
                <a href="{{ route('user_admin.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
      </div>
    </div>
  </div>
</div>

@endsection