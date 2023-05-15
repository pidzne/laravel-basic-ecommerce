@extends('layouts.admin')
@section('title', 'Danh sách đơn hàng')
@section('css')
  <style>
    #spanStyle {
      font-size: 15px;
      font-weight: bold;
      border-radius: 5px;
      padding: 5px;
    }
  </style>
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách đơn hàng</h4>

        <form action="{{ route('search_order') }}" method="GET">
          @csrf
          <label for="search-select">Tìm theo trạng thái: </label>
          <select name="searchByStatus" id="search-select">
            <option value="">Chọn 1</option>
            <option value="0">Đang chờ xử lý</option>
            <option value="1">Đang lấy hàng</option>
            <option value="2">Đang giao hàng</option>
            <option value="3">Đã giao hàng</option>
          </select>

          <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
        </form>

        <div class="table-responsive pt-3">
          <table class="table table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Mã đặt hàng</th>
                <th>Tên người mua hàng</th>
                <th>Ngày mua hàng</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ordersInfo as $index => $items)
                    <tr>
                        <td class="align-middle">{{ $items->id }}</td>
                        <td class="align-middle">{{ $items->ordersNo }}</td>
                        <td class="align-middle">{{ $items->userName }}</td>
                        <td class="align-middle">{{  $items->ordersDate ? date('d-m-Y', strtotime($items->ordersDate)) : '-' }}</td>
                        <td class="align-middle">
                          @if ($items->oStatus=='0')
                            <span class="bg bg-primary text-white" id="spanStyle">Đang chờ xử lý</span>
                          @elseif ($items->oStatus=='1')
                            <span class="bg bg-warning" id="spanStyle">Đang lấy hàng</span>
                          @elseif ($items->oStatus=='2')
                            <span class="bg bg-info text-white" id="spanStyle">Đang giao hàng</span>
                          @elseif ($items->oStatus=='3')
                            <span class="bg bg-success text-white" id="spanStyle">Đã giao hàng</span>
                          @elseif ($items->oStatus=='7')
                            <span class="bg bg-dark text-white" id="spanStyle">Thanh toán online</span>
                          @else
                            <span class="bg bg-danger text-white" id="spanStyle">Đã hủy đơn</span>
                          @endif
                        </td>
                        <td class="align-middle">
                          @if ($items->oCancel>0)
                            <a href="{{route('order_admin.show', ['id'=>$items->id])}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                            <a href="{{route('order_admin.destroy', ['id'=>$items->id])}}" class="btn btn-danger" style="margin-right: 1px" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                          @elseif ($items->oStatus=='5')
                            <a href="{{route('order_admin.show', ['id'=>$items->id])}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                            <a href="{{route('order_admin.destroy', ['id'=>$items->id])}}" class="btn btn-danger" style="margin-right: 1px" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                          @elseif ($items->oStatus=='7')
                            <a href="{{route('order_admin.show', ['id'=>$items->id])}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                            <a href="{{route('order_admin.destroy', ['id'=>$items->id])}}" class="btn btn-danger" style="margin-right: 1px" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                          @elseif ($items->oStatus=='3' && $items->payment_method == '0')
                            <a href="{{route('order_admin.show', ['id'=>$items->id])}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                            <a href="{{route('order_admin.edit', ['id'=>$items->id])}}" class="btn btn-primary" style="margin-right: 1px">Sửa</a>
                            <a href="{{route('order_admin.destroy', ['id'=>$items->id])}}" class="btn btn-danger" style="margin-right: 1px" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                          @else
                            <a href="{{route('order_admin.show', ['id'=>$items->id])}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                            <a href="{{route('order_admin.edit', ['id'=>$items->id])}}" class="btn btn-primary" style="margin-right: 1px">Sửa</a>
                            <a href="{{route('order_admin.destroy', ['id'=>$items->id])}}" class="btn btn-danger" style="margin-right: 1px" onclick="return confirm('Bạn có muốn xóa không!')">Xóa</a>
                          @endif    
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      <div>{{ $ordersInfo->links() }}</div>
    </div>
  </div>
</div>
@endsection