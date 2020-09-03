 @extends('master')
 @section('content')
 <div class="inner-header">
 	<div class="container">
 		<div class="pull-left">
 			<h3 class="inner-title">Đăng nhập</h3>
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
 		<form action="{{route('login')}}" method="post" class="beta-form-checkout">
 			<input type="hidden" name="_token" value="{{csrf_token()}}">
 			<div class="row">
 				<div class="col-sm-3"></div>
 				@if(Session::has('flag'))
 				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
 				@endif
 				<div class="col-sm-6">
 					<h4>Đăng nhập</h4>
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
								<th><label for="phone">Password*</label></th>
								<td><input type="password" name="password" required style="width: 100%"></td>
							</tr>
							<tr>
								<th><button type="submit" class="btn btn-primary">Login</button></th>
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