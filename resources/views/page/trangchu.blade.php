@extends('master')
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="./source/img/slide1.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="./source/img/slide4.jpg" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="./source/img/slide5.jpg" class="d-block w-100" alt="...">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div><!--slider-->
<div class='container'>
	<div class="row">
		<div class="col-sm-3">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action active">
					DANH MỤC SẢN PHẨM
				</a>
				@foreach($loai as $l)
				<a href="{{route('trang-chu',$l->id)}}" class="list-group-item list-group-item-action">{{$l->name}}</a>
				@endforeach
			</div>
		</div>
		<div class="col-sm-9">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="row">
						@foreach($sanphammoi as $new)
						<div class="col-sm-4">
							<h3>{{$new->name}}</h3>
							<p class="card-text text-danger">{{number_format($new->price)}}đ</p>
							<a href="{{route('chitietsanpham',$new->id)}}"><img src="./source/img/{{$new->image}}" class="d-block width:270px;" alt="{{$new->name}}"><br>
							<button class="btn btn-outline-secondary"><a href="{{route('themgiohang',$new->id)}}"><strong>Thêm vào giỏ</strong></a></button>
						</div>
						@endforeach
					</div>
					<br><br>
					<div class="row justify-content-center">{{$sanphammoi->links()}}</div>
				</div>
			</div>
		</div>
	</div>
</div><!--body-->
@endsection		