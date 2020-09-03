@extends('master')
@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">TRANG CHỦ</a></li>
			<li class="breadcrumb-item">SẢN PHẨM</li>
			<li class="breadcrumb-item" aria-current="page">{{$loai_sp->name}}</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-sm-3">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action active">
					DANH MỤC SẢN PHẨM
				</a>
				@foreach($loai as $l)
				<a href="{{route('loaisanpham',$l->id)}}" class="list-group-item list-group-item-action">{{$l->name}}</a>
				@endforeach
			</div>
		</div>
		<div class="col-sm-9">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="row">
						@foreach($sp_theoloai as $sp)
						<div class="col-sm-4">
							<h3>{{$sp->name}}</h3>
							<p class="card-text text-danger">{{number_format($sp->price)}}đ</p>
							<a href="{{route('chitietsanpham',$sp->id)}}"><img src="../source/img/{{$sp->image}}" width="150px" height="150px" class="d-block width:270px;" alt="{{$sp->name}}"></a><br>
							<button class="btn btn-outline-secondary mb-3"><a href="{{route('themgiohang',$sp->id)}}"><strong>Thêm vào giỏ</strong></a></button>
						</div>
						@endforeach
					</div>					
					<br>
					<div class="pagination justify-content-center">{{$sp_theoloai->links()}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection