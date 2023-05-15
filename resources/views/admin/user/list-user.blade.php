@extends('layouts.admin')
@section('title', 'Danh sách tài khoản')
@section('css')
  <style>
    input:focus {
      border-color: black; 
    }
  </style>
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách tài khoản</h4>
    
        <form action="{{ route('search_user') }}" method="GET">
          @csrf
          <label for="search-select">Tìm theo vai trò: </label>
          <select name="searchByRole" id="search-select">
            <option value="">Chọn 1</option>
            <option value="">Tất cả</option>
            <option value="1">Quản trị viên</option>
            <option value="0">Người dùng</option>
          </select>

          <label for="search-name" class="ml-3">Tìm theo tên: </label>
          <input type="text" name="searchByName" id="search-name">
          <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
        </form>

        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên người dùng</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td class="align-middle">{{ $u->id }}</td>
                        <td class="align-middle">
                          <img src="{{asset('uploads/userImg/'.$u->image)}}" alt="userImg">
                        </td>
                        <td class="align-middle">{{ $u->name}}</td>
                        <td class="align-middle">
                          @if ($u->gender==1)
                            <span>Nam</span>
                          @else
                            <span>Nữ</span>
                          @endif
                        </td>
                        <td class="align-middle">{{ $u->email}}</td>
                        <td class="align-middle">{{ $u->phone}}</td>
                        <td class="align-middle">
                          @if ($u->role=='1')
                            <span>Quản trị viên</span>
                          @else
                            <span>Người dùng</span>
                          @endif
                        </td>
                        <td class="align-middle">    
                            @if ($u->role=='1')
                              <a href="{{route('user_admin.edit', ['id'=>$u->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                            @else
                              <a href="{{route('user_admin.edit', ['id'=>$u->id])}}" class="btn btn-primary" style="margin-right: 10px">Sửa</a>
                              <a href="{{route('user_admin.destroy', ['id'=>$u->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                            @endif
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection