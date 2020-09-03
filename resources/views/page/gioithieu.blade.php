@extends('master')
@section('content')
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('trang-chu')}}">TRANG CHỦ</a></li>
			<li class="breadcrumb-item active" aria-current="page">GIỚI THIỆU VỀ MANGA & FIGURE</li>
		</ol>
	</nav>
	<img src="./source/img/bosuutam3.jpg">
	<h4 class="text-danger"><i class='fas fa-caret-right' style='font-size:24px'></i>Manga là gì?</h4>
	<p>
		Manga là một cụm từ trong tiếng Nhật để chỉ các loại truyện tranh và tranh biếm hoạ nói chung của các nước trên thế giới.
	</p>
	<h4 class="text-danger"><i class='fas fa-caret-right' style='font-size:24px'></i>Figure là gì?</h4>
	<p>
		Figure là mô hình, là tượng, là bất kì sản phẩm 3D nào mô phỏng lại nhân vật trong phim, trong truyện, game, tranh vẽ.<br>
		Thông thường figure mang hình dạng con người, đôi khi là thú, thần thánh, yêu tinh, quái vật hay thậm chí là sinh vật ngoài hành tinh... bất cứ nhân vật nào được họa sĩ ngĩ ra, được điêu khắc thành 3D thì được gọi là figure
	</p>
</div>
@endsection