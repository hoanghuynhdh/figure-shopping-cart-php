@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
			</ol>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">		
		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
			<div class="text-center">
				<h4>Đặt hàng</h4>
				<div class="space20">&nbsp;</div>
				<table class="table table-borderless">
					<thead>
						<tr>
							<th><label for="name">Họ tên*</label></th>
							<th><input type="text" name="name" style="width: 100%" placeholder="Họ tên" required></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th><label>Giới tính </label></th>
							<td>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
							</td>
						</tr>
						<tr>
							<th><label for="email">Email*</label></th>
							<td><input type="email" id="email" name="email" required style="width: 100%" placeholder="expample@gmail.com"></td>
						</tr>
						<tr>
							<th><label for="adress">Địa chỉ*</label></th>
							<td><input type="text" id="address" name="address" style="width: 100%" placeholder="Street Address" required></td>
						</tr>
						<tr>
							<th><label for="phone">Điện thoại*</label></th>
							<td><input type="text" id="phone" name="phone" style="width: 100%" required></td>
						</tr>
						<tr>
							<th><label for="notes">Ghi chú</label></th>
							<td><textarea id="notes" style="width: 100%" name="notes"></textarea></td>
						</tr>
					</tbody>
				</table>
				<h3 style="text-align: center">Giỏ hàng của bạn</h3>
				<div class="space20">&nbsp;</div>
				@if(Session::has('cart'))
				<table class="table table-bordered">
					<thead >
						<tr>
							<th scope="col">Sản phẩm</th>
							<th scope="col">Đơn giá</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Thành tiền</th>
							<th scope="col">&nbsp;</th>
						</tr>
					</thead>
					@foreach($product_cart as $cart)
					<tbody >
						<tr>
							<th><img width="25%" src="source/img/{{$cart['item']['image']}}" alt="" class="pull-left">&nbsp;{{$cart['item']['name']}}</th>
							<td style="color: red">{{number_format($cart['item']['price'])}} đồng</td>
							<td>{{$cart['qty']}}</td>
							<td style="color: red">{{number_format($cart['item']['price'] * $cart['qty'])}} đồng</td>
							<td><a class="cart-item-delete" href="{{route('xoagiohang',$cart['item']['id'])}}"><i class="fa fa-times"></i></a></td>
						</tr>
					</tbody>
					@endforeach
				</table>
				@endif
				<div>
					<h5 align="right">Thành tiền:&nbsp; <span style="color: red">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</span></h5>
					<div class="text-right">
						<button type="submit" class="btn btn-primary" href="#">THANH TOÁN</i></button>
					</div>
				</div><br>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
