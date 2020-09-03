@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>{{$sanpham->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors)> 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif

            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('loi'))
            <div class="alert alert-danger">
                {{session('loi')}}
            </div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="theloai">
                            @foreach ($theloai as $tl)
                            <option @if( $sanpham->id_type == $tl->id)
                                {{"selected"}}
                                @endif
                                value="{{$tl->id}}">{{$tl->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" placeholder="Please Enter Category Name" value="{{$sanpham->name}}" />
                    </div>
                    <div class="form-group">
                        <label>giá gốc</label>
                        <input class="form-control" name="price" placeholder="Please Enter Category Order" value="{{$sanpham->price}}" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" value="{{$sanpham->description}}"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Ảnh sản phẩm</label>
                        <p>
                            <img src="source/img/{{$sanpham->image}}" height="150px" width="150px">
                        </p>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter Category image" />
                    </div>

                    <button type="submit" class="btn btn-default">Sữa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection