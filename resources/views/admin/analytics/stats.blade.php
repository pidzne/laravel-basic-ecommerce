@extends('layouts.admin')
@section('title', 'Thống kê')
@section('css')
  <style>
    .table td img {
      border-radius: 0;
    }
  </style>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Thống kê kho hàng</p>
          <p class="card-title">Tổng sản phẩm trong kho: {{ $t }} sản phẩm</p>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Hình</th>
                    <th>Loại sản phẩm</th>
                    <th>Số lượng</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($totalProdByCate as $index => $total)
                  <tr>
                    <td class="align-middle">{{ $index + 1 }}</td>
                    <td class="align-middle"><img src="{{ asset('uploads/cateImg/'.$total->cImg) }}" alt="cateImg"></td>
                    <td class="align-middle">{{ $total->cName }}</td>
                    <td class="align-middle">{{ $total->total }}</td>
                  </tr>         
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Tổng doanh thu</p>
          <h1>{{number_format($revenue).''.''}}<sup>đ</sup></h1>
        </div>
        <canvas id="total-sales-chart"></canvas>
      </div>
    </div>
  </div>
 
<div class="row mt-3">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          
          <div class="tab-content py-0 px-0">
            <p class="card-title">Thống kê trạng thái đơn hàng</p>
           <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-primary text-white">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left text-white">Đang chờ xử lý</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$orderStatus0}}</h3>
                      <i class="fas fa-tasks me-3 icon-lg text-white"></i>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-warning text-dark">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left text-dark">Đang lấy hàng</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$orderStatus1}}</h3>
                      <i class="fas fa-truck-couch me-3 icon-lg text-dark"></i>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-info text-white">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left text-white">Đang giao hàng</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$orderStatus2}}</h3>
                      <i class="fas fa-shipping-fast me-3 icon-lg text-white"></i>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-success text-white">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left text-white">Đã giao hàng</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $orderStatus3 }}</h3>
                      <i class="fas fa-check-square me-3 icon-lg text-white"></i>
                    </div>  
                  </div>
                </div>
              </div>
  
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-danger text-white">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left text-white">Đã hủy đơn</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $orderCancel }}</h3>
                      <i class="fas fa-times-square me-3 icon-lg text-white"></i>
                    </div>  
                  </div>
                </div>
              </div>

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left text-white">Thanh toán online</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $orderOnline }}</h3>
                      <i class="fas fa-globe me-3 icon-lg text-white"></i>
                    </div>  
                  </div>
                </div>
              </div>

            </div>
          </div>
          
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12 stretch-card mb-3">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Top 5 sản phẩm bán chạy nhất</p>
        <div class="table-responsive">
          <table id="recent-purchases-listing" class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                  <th>#</th>
                  <th>Hình</th>
                  <th>Tên sản phẩm</th>
                  <th>Size</th>
                  <th>Màu sắc</th>
                  <th>Số lượng mua</th>
                  <th>Giá tiền</th>
                  <th>Doanh thu</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topProdHighest as $index => $top)
                <tr>
                  <td class="align-middle">{{ $index + 1 }}</td>
                  <td class="align-middle"><img src="{{ asset('uploads/prodImg/'.$top->pImg) }}" alt="prodImg"></td>
                  <td class="align-middle">{{ $top->pName }}</td>
                  <td class="align-middle">{{ $top->size }}</td>
                  <td class="align-middle">{{ $top->color }}</td>
                  <td class="align-middle">{{ $top->total }}</td>
                  <td class="align-middle">
                    @if ($top->prod_selling_price>=1)
                      {{ number_format($prod_selling_price = ($top->prod_original_price - ($top->prod_original_price * $top->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                    @else
                      {{ number_format($top->prod_original_price).''.'' }}<sup>đ</sup>
                   @endif
                  </td>
                  <td class="align-middle">
                    @if ($top->prod_selling_price>=1)
                      {{ number_format($top->total * ($prod_selling_price = ($top->prod_original_price - ($top->prod_original_price * $top->prod_selling_price) / 100))).''.'' }}<sup>đ</sup>
                    @else
                      {{ number_format($top->total * $top->prod_original_price).''.'' }}<sup>đ</sup>
                    @endif
                  </td>
                </tr>         
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Top 5 sản phẩm bán ít nhất</p>
        <div class="table-responsive">
          <table id="recent-purchases-listing" class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                  <th>#</th>
                  <th>Hình</th>
                  <th>Tên sản phẩm</th>
                  <th>Size</th>
                  <th>Màu sắc</th>
                  <th>Số lượng mua</th>
                  <th>Giá tiền</th>
                  <th>Doanh thu</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topProdLowest as $index => $top)
                <tr>
                  <td class="align-middle">{{ $index + 1 }}</td>
                  <td class="align-middle"><img src="{{ asset('uploads/prodImg/'.$top->pImg) }}" alt="prodImg"></td>
                  <td class="align-middle">{{ $top->pName }}</td>
                  <td class="align-middle">{{ $top->size }}</td>
                  <td class="align-middle">{{ $top->color }}</td>
                  <td class="align-middle">{{ $top->total }}</td>
                  <td class="align-middle">
                    @if ($top->prod_selling_price>=1)
                      {{ number_format($prod_selling_price = ($top->prod_original_price - ($top->prod_original_price * $top->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                    @else
                      {{ number_format($top->prod_original_price).''.'' }}<sup>đ</sup>
                   @endif
                  </td>
                  <td class="align-middle">
                    @if ($top->prod_selling_price>=1)
                      {{ number_format($top->total * ($prod_selling_price = ($top->prod_original_price - ($top->prod_original_price * $top->prod_selling_price) / 100))).''.'' }}<sup>đ</sup>
                    @else
                      {{ number_format($top->total * $top->prod_original_price).''.'' }}<sup>đ</sup>
                    @endif
                  </td>
                </tr>         
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-12 stretch-card mt-3">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Danh sách các sản phẩm chưa bán được</p>
        <div class="table-responsive">
          <table id="recent-purchases-listing" class="table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                  <th>#</th>
                  <th>Hình</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Giá sản phẩm</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prodNotSold as $i => $v)
                <tr>
                  <td class="align-middle">{{ $v->$i = $i + 1 }}</td>
                  <td class="align-middle">
                     <img src="{{ asset('uploads/prodImg/'.$v->prod_image) }}" alt="prodImg" />
                  </td>
                  <td class="align-middle">{{ $v->prod_name }}</td>
                  <td class="align-middle">{{ $v->prod_quantity }}</td>
                  <td class="align-middle">{{ number_format($v->prod_original_price).''.''}}<sup>đ</sup></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div>
            {{ $prodNotSold->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection