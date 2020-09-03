@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">TRANG CHỦ</a></li>
				<li class="breadcrumb-item" aria-current="page">Thông tin chi tiết sản phẩm</li>
				<li class="breadcrumb-item">{{$sanpham->name}}</a></li>
			</ol>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-4 text-center">
						<img src="../source/img/{{$sanpham->image}}" alt="{{$sanpham->name}}" style="width: 100%">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
							<p class="single-item-price">
								<span class="flash-sale" style="color:red">{{number_format($sanpham->price)}} đồng</span>
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="space20">&nbsp;</div>
						<p>Số lượng:</p>
						<div class="single-item-options">
							<select class="form-control">
								<option>Số lượng</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<button class="btn btn-outline-secondary mt-3" style="width:100%"><a href="{{route('themgiohang',$sanpham->id)}}"><strong>Thêm vào giỏ</strong></a></button>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4 class="mb-5">Sản phẩm tương tự:</h4>
					<div class="row">
						@foreach($sp_tuongtu as $sptt)
						<div class="col-sm-4">
							<div class="single-item text-center">
								<div class="single-item-header">
									<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="../source/img/{{$sptt->image}}" alt="{{$sptt->name}}" width="150px" height="150px"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$sptt->name}}</p>
									<p class="single-item-price" style="font-size: 18px">
										<span class="flash-sale" style="color:red">{{number_format($sptt->price)}} đồng</span>
									</p>
								</div>
								<div class="single-item-caption mb-5">
									<button class="btn btn-outline-secondary"><a href="{{route('themgiohang',$sptt->id)}}"><strong>Thêm vào giỏ</strong></a></button>
									<button class="btn btn-outline-secondary"><a href="{{route('chitietsanpham',$sptt->id)}}"><strong>Details</strong></a></button>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div><br>
					<div class="row justify-content-center">{{$sp_tuongtu->links()}}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Sản phẩm bán chạy</h3>
					<div class="widget-body">
					@foreach($sanpham as $sp)
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left mb-3 mr-3" href="{{route('chitietsanpham',$sptt->id)}}"><img src="../source/img/{{$sanpham->image}}" style="width:100px; heith:100px" alt="{{$sanpham->name}}"></a>
								<div class="media-body">
									{{$sanpham->name}}
									<span class="beta-sales-price" style="color:red">{{number_format($sanpham->price)}} đồng</span>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Sản phẩm mới</h3>
					<div class="widget-body">
					@foreach($sp_tuongtu as $sptt)
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left mb-3 mr-3"  href="{{route('chitietsanpham',$sptt->id)}}"><img src="../source/img/{{$sptt->image}}" style="width:100px; height: 100px" alt="{{$sptt->name}}"></a>
								<div class="media-body">
								{{$sptt->name}}
									<span class="beta-sales-price" style="color:red">{{number_format($sptt->price)}} đồng</span>
								</div>
							</div>
						</div>
					@endforeach
					</div><hr>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection