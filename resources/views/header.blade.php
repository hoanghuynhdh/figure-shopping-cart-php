<header>
	<div class="header">
		<div class="row">
			<div class="col-sm-3">
				<a href="{{route('trang-chu')}}"><img src="../source/img/logo.png" width="200px; ml-auto mr-auto;"></a>
			</div>
			<div class="col-sm-4 mt-auto mb-auto">
				<form role='search' method="get" id="searchform" action="{{route('search')}}">
					<div class="row">
						<div class="col-sm-8">
							<input class="form-control" type="search" name='key' placeholder="Nhập từ khóa tìm kiếm" aria-label="Search">
						</div>
						<div class="col-sm-4">
							<button class="btn btn-outline-info" type="submit">Tìm kiếm</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-5 mt-auto mb-auto">
				<div class="row">
					<div class="col-sm-4">
						<ul style="list-style:none" class="top-details menu-beta l-inline">
							@if(Auth::check())
							<li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('logout')}}">Đăng xuất</a></li>
							@else
							<li><a href="{{route('login')}}"><i class="fa fa-user">Đăng nhập</i></a></li>
							<li><a href="{{route('signin')}}"><i class="fa fa-user">Đăng ký</i></a></li>
							@endif
						</ul>
					</div>
					<div class="col-sm-8">
						<div class="beta-comp" >
						@if(Session::has('cart'))
							<div class="beta-dropdown cart-body">
								<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart">Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif)</i>
								</button>
								@foreach($product_cart as $product)
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<div class="dropdown-item">
										<div class="media">
											<img src="../source/img/{{$product['item']['image']}}"  alt="">
											<div class="media-body text-right">
												<h5 class="mt-0">{{$product['item']['name']}}</h5>
												{{$product['qty']}}*{{number_format($product['item']['price'])}}
											</div>
											<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
										</div>
									</div>
									@endforeach
									<div class="dropdown-item">
										<div class="dropdown-item text-right">Tổng tiền: @if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đ</div>
									</div>
									<div class="dropdown-divider"></div>
									<div class="clearfix"></div>
									<div class="dropdown-item text-center"><a href="{{route('dathang')}}"><button class="btn-primary">Đặt hàng</button></a></div>
								</div>
							</div>
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{route('trang-chu')}}"><strong>TRANG CHỦ </strong><span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<strong>SẢN PHẨM</strong>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					@foreach ($loai_sp as $loai)
					<a class="dropdown-item" href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a>
					@endforeach
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('gioithieu')}}"><strong>GIỚI THIỆU</strong></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('lienhe')}}"><strong>LIÊN HỆ</strong></a>
			</li>
		</ul>
	</div>
</nav>