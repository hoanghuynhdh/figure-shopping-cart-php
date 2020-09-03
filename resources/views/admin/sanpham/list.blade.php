@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors)> 0)
            <div class="alert alert-danger">
                @foreach ($erros->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <div class="row">{{$sanpham->links()}}</div>
            <li><a>Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($theloai as $loai)
								<li><a href="admin/sanpham/danhsach/{{$loai->id}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Descreption</th>
                        <th>id_type</th>
                        <th>price</th>
                        <th>unit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sanpham as $sp)
                    <tr class="odd gradeX" align="center">

                        <td>{{$sp->id}}</td>
                        <td><img src="source/img/{{$sp->image}}" alt="" height="150px" width="150px"></td>
                        <td>{{$sp->name}}</td>
                        <td>{{$sp->description}}</td>
                        <td>{{$sp->id_type}}</td>
                        <td>{{$sp->price}}</td>
                        <td>{{$sp->unit}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Edit</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
        <div class="row">{{$sanpham->links()}}</div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection