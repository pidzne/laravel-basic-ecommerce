@extends('layouts.admin')
@section('title', 'Thống kê')
@section('css')
  <style>
    .roleStyle {
    margin: 0 auto;
  }
  </style>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Biểu đồ vai trò --}}
<script>
  const ctx12 = document.getElementById('roleChart');
  new Chart(ctx12, {
    type: 'doughnut',
    data: {
      labels: ['Người dùng', 'Quản trị viên'],
      datasets: [{
        label: '',
        data:  {!! json_encode($roleChart->dataset)!!},
        borderWidth: 1
      }]
    },
    options: {
    responsive: false,
    plugins: {
      legend: {
        display: true
      },
    }
  },
  });
</script>

{{-- Biểu đồ sản phẩm theo danh mục --}}
<script>
  const ctx1 = document.getElementById('prodByCateChart').getContext('2d');

  new Chart(ctx1, {
    type: 'pie',
    data: {
      labels: {!! json_encode($prodByCateChart->labels)!!},
      datasets: [{
        label: '',
        data: {!! json_encode($prodByCateChart->dataset)!!},
        borderWidth: 1
      }]
    },
    options: {
    responsive: false,
    plugins: {
      legend: {
        position: 'top',
        display: true
      },
    }
    }
  });
</script>

{{-- Biểu đồ sản phẩm theo thương hiệu --}}
<script>
  const ctx3 = document.getElementById('prodByBrandChart');

  new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: {!! json_encode($prodByBrandChart->labels)!!},
      datasets: [{
        label: '',
        data: {!! json_encode($prodByBrandChart->dataset)!!},
        borderWidth: 1
      }]
    },
    options: {
    responsive: false,
    plugins: {
      legend: {
        display: true
      },
    }
    }
  });
</script>


{{-- Biểu đồ sản phẩm mua nhiều --}}
<script>
  const ctx4 = document.getElementById('topSellProdChart');

  new Chart(ctx4, {
    type: 'bar',
    data: {
      labels: {!! json_encode($topSellProdChart->labels) !!},
      datasets: [{
        label: '',
        data: {!! json_encode($topSellProdChart->dataset)!!},
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    },
    options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
    },
    scales: {
        y: {
          beginAtZero: true,
          ticks: {
                callback: function(val) {
                    return Number.isInteger(val) ? val : null;
                }
            },
        }
    },
    }
  });
</script>

@endsection
@section('content')
    <div class="row">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thống kê vai trò</h4>
            <canvas id="roleChart" class="roleStyle"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sản phẩm theo danh mục</h4>
            <canvas id="prodByCateChart" class="roleStyle"></canvas>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sản phẩm theo thương hiệu</h4>
            <canvas id="prodByBrandChart" class="roleStyle"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sản phẩm mua nhiều</h4>
              <canvas id="topSellProdChart"></canvas>
          </div>
        </div>
      </div>
    </div>
@endsection
