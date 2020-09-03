@extends('master')
@section('content')
<div class='container'>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">TRANG CHỦ</a></li>
			<li class="breadcrumb-item active" aria-current="page">TÌM KIẾM</li>
		</ol>
	</nav>
	<div class="tab-content" id="v-pills-tabContent">
		<h4>Tìm kiếm: {{$tukhoa}}</h4>
		<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
			<div class="row">
				@foreach($product as $new)
				<div class="col-sm-3">
					<h3>{{$new->name}}</h3>
					<p class="card-text text-danger">{{number_format($new->price)}}đ</p>
					<a href="{{route('chitietsanpham',$new->id)}}"><img src="./source/img/{{$new->image}}" width="150px" height="150px" class="d-block width:270px;" alt="{{$new->name}}"></a><br>
					<button class="btn btn-outline-secondary mb-5"><a href="{{route('themgiohang',$new->id)}}"><strong>Thêm vào giỏ</strong></a></button>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection