@extends('layouts.admin')
@section('title', 'Dashboard iSky')
@section('css')
<style>
  .jumbotron {
    margin: 0;
    border-radius: 10px;
    background:
        linear-gradient(rgba(0, 0, 250, 0.25),rgba(125, 250, 250, 0.45)),
        url('https://images.unsplash.com/photo-1461301214746-1e109215d6d3?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=1050&ixid=MnwxfDB8MXxyYW5kb218MHx8bmF0dXJlfHx8fHx8MTY3MTg2OTI5Ng&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1600');
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: white !important;
    height: 200px;
    width: 100%;
  }
  #cardStyle {
    background-color: transparent;
    border: none;
  }
  .spanJumbotronStyle {
    margin-left: 10px;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        {{-- <h1 class="display-2 pt-5"><i class="fas fa-sun-cloud"></i><span class="spanJumbotronStyle">Chào ngày mới!</span></h1> --}}
        <h1><i class="fas fa-sun-cloud"></i><span class="spanJumbotronStyle">Chào ngày mới!</span></h1>
        <p class="lead"><span>{{Auth::user()->name}}</span></p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card" id="cardStyle">
      <div class="card-body dashboard-tabs p-0">
        <div class="tab-content py-0 px-0">

         <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-dark text-white">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left text-white">Danh mục</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$cateCount}}</h3>
                    <i class="fas fa-waveform-path me-3 icon-lg text-white"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left text-white">Sản phẩm</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$prodCount}}</h3>
                    <i class="fas fa-box me-3 icon-lg text-danger text-white"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-light">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Người dùng</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$userCount}}</h3>
                    <i class="fas fa-user-plus me-3 icon-lg text-dark"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-success">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Bài viết</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $blogCount }}</h3>
                    <i class="fas fa-pen-nib me-3 icon-lg text-dark"></i>
                  </div>  
                </div>
              </div>
            </div>



            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-primary text-white">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left text-white">Bình luận</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $reviewCount }}</h3>
                    <i class="fas fa-comment-alt me-3 icon-lg text-white"></i>
                  </div>  
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-secondary">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Slider</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $sliderCount }}</h3>
                    <i class="far fa-presentation me-3 icon-lg text-dark"></i>
                  </div>  
                </div>
              </div>
            </div>


            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-danger">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Album</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $albumCount }}</h3>
                    <i class="far fa-images me-3 icon-lg text-dark"></i>
                  </div>  
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card bg-gradient-info text-white">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left text-white">Liên hệ</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $contactCount }}</h3>
                    <i class="fas fa-info-square me-3 icon-lg text-white"></i>
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

{{-- <div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Quản lý kho hàng</p>
        <div class="table-responsive">
          <table id="recent-purchases-listing" class="table">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Hình ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng ban đầu</th>
                  <th>Số lượng trong kho</th>
                  <th>Số lượng đã bán</th>
                  <th>Doanh thu</th>
              </tr>
            </thead>
            <tbody>
                  <td>1</td>
                  <td>Jeremy Ortega</td>
                  <td>Levelled up</td>
                  <td>Catalinaborough</td>
                  <td>$790</td>
                  <td>06 Jan 2018</td>
                  <td>$2274253</td>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection