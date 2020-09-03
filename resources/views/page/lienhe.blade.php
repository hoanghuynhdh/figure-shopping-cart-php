@extends('master')
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">TRANG CHỦ</a></li>
		<li class="breadcrumb-item active" aria-current="page">LIÊN HỆ</li>
	</ol>
</nav>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.477576279843!2d106.63214551405635!3d10.774687292322682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ea144839ef1%3A0x798819bdcd0522b0!2sInformation+Technology+College+HoChiMinh+City!5e0!3m2!1sen!2s!4v1558363934166!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;width: 100%" allowfullscreen></iframe>

<div class="container mt-5">
	<div class="row">
		<div class="col-sm-4 ml-auto mr-auto">
			<table class="table table-bordered">
				<thead>
					<tr style="color: blue">
						<th scope="col"><i class="fa fa-map-marker-alt" style="font-size:18px"></i></th>
						<th scope="col"><strong>Địa chỉ</strong></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">&nbsp;</th>
						<td>12 Trịnh Định Thảo, Hòa Thạnh, Tân Phú. TP.HCM</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-4 ml-auto mr-auto">
			<table class="table table-bordered">
				<thead>
					<tr style="color: blue">
						<th scope="col"><i class="fa fa-envelope" style="font-size:18px"></i></th>
						<th scope="col"><strong>Email</strong></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">&nbsp;</th>
						<td>kickoffmanvn@gmail.com</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-4 mr-auto ml-auto">
			<table class="table table-bordered">
				<thead>
					<tr style="color: blue">
						<th scope="col"><i class="fa fa-phone" style="font-size:18px"></i></th>
						<th scope="col"><strong>Điện thoại</strong></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">&nbsp;</th>
						<td>0898124973</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<h5 class="mt-5 mb-5" style="text-align: center;color: red"><strong>Nếu có thắc mắc nào xin hãy liên hệ với bọn mình dưới đây!</strong></h5>
	<form>
		<div class="row mb-4">
			<div class="col">
				<input type="text" class="form-control" placeholder="Họ tên">
			</div>
			<div class="col">
				<input type="text" class="form-control" placeholder="Email">
			</div>
			<div class="col">
				<input type="text" class="form-control" placeholder="Số điện thoại">
			</div>
		</div>
		<textarea class="form-control mb-4" rows="3" placeholder="Tin nhắn"></textarea>
		<button type="submit" class="btn btn-danger mb-5" style="width: 120px;">GỬI</button>			
	</form>
</div>
@endsection