@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>{{$theloai->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
           
            <div class="col-lg-7" style="padding-bottom:120px">
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
                <form action="admin/loaisanpham/sua/{{$theloai->id}}" method="POST">
                    <input type="hidden" name="_token"  value={{csrf_token()}} />
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="ten" placeholder="điền tên thể loại" value="{{$theloai->name}}" />
                    </div>

                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection