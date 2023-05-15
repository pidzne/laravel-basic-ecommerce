@extends('layouts.home')
@section('title', 'Thanh toán thành công')
@section('content')
<div class="container mt-5 mb-5">
   <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark iIcon">✓</i>
    </div>
    <h1 class="h1Tag text-center">Thanh toán đơn hàng thành công!</h1> 
    <p class="pTag text-center">Cảm ơn đã mua hàng tại iSkyShop, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!</p>
    <div class="text-center mt-3">
        <a href="{{ url('/') }}" class="btn btn-primary btn-round btn-shadow">Quay lại</a>
    </div>
</div>
@endsection
