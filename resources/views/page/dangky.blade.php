 @extends('master')
 @section('content')
<div class="inner-header">
 	<div class="container">
 		<div class="pull-left">
 			<h4 class="inner-title">Đăng kí</h4>
 			<nav aria-label="breadcrumb">
 				<ol class="breadcrumb">
 					<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">Trang chủ</a></li>
 					<li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
 				</ol>
 			</nav>
 		</div>
 		<div class="clearfix"></div>
 	</div>
</div>

<div class="container">
 	<div id="content">
 		<form action="{{route('signin')}}" method="post" class="beta-form-checkout">
 			<input type="hidden" name="_token" value="{{csrf_token()}}">
 			<div class="row">
 				<div class="col-sm-3"></div>
 				@if(count($errors)>0)
 				<div class="alert alert-danger">
 					@foreach($errors->all() as $err)
 					{{$err}}
 					@endforeach
 				</div>
 				@endif
 				@if(Session::has('thanhcong'))
 				<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
 				@endif
 				<div class="col-sm-6">
 					<h4>Đăng kí</h4>
 					<div class="space20">&nbsp;</div>
 					<table class="table table-borderless">
 						<thead>
 							<tr>
 								<th><label for="email">Email address*</label></th>
 								<th><input type="email" name="email" required style="width: 100%"></th>
 							</tr>
 						</thead>
 						<tbody>
 							<tr>
 								<th><label for="your_last_name">Fullname*</label></th>
 								<td><input type="text" name="fullname" required style="width: 100%"></td>
 							</tr>
 							<tr>
 								<th><label for="adress">Address*</label></th>
 								<td><input type="text" name="address" value="Street Address" required style="width: 100%"></td>
 							</tr>
 							<tr>
 								<th><label for="phone">Phone*</label></th>
 								<td><input type="text" name="phone" required style="width: 100%"></td>
 							</tr>
 							<tr>
 								<th><label for="password">Password*</label></th>
 								<td><input type="password" name="password" required style="width: 100%"><td>
 								</tr>
 								<tr>
 									<th><label for="re_password">Re password*</label></th>
 									<td><input type="password" name="re_password" required style="width: 100%"></td>
 								</tr>
 								<tr>
 									<th><button type="submit" class="btn btn-primary">Register</button></th>
 								</tr>
						</tbody>
					</table>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection