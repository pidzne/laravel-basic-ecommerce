@extends('layouts.admin')
@section('title', 'Danh sách liên hệ')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách liên hệ</h4>
        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Tên người liên hệ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                {{-- <th>Hành động</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($contactInfo as $contact)
                    <tr>
                        <td class="align-middle">{{ $contact->id }}</td>
                        <td class="align-middle">{{ $contact->name }}</td>
                        <td class="align-middle">{{ $contact->email }}</td>
                        <td class="align-middle">{{ $contact->phone }}</td>
                        <td class="align-middle">{{ $contact->title }}</td>
                        <td class="align-middle">{{ $contact->message }}</td>
                        {{-- <td class="align-middle">
                            <a href="{{url('delete-contact/'.$contact->id)}}" class="btn btn-danger">Xóa</a>
                        </td> --}}
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="">
          {{ $contactInfo->links() }}
      </div>
      </div>
    </div>
</div>
@endsection