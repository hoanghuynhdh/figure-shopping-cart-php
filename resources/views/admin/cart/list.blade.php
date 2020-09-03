@extends('admin.index')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th aria-sort="ascending">Tên người dùng</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt hàng</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th class="sorting col-md-1">Action</th>
                        <th class="sorting col-md-2">Xóa</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>Chưa xử lý</td>
                        <td><a href="admin/cart/chitiet/{{ $customer->id }}">Detail</a></td>

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cart/xoa/{{ $customer->id }}"> Delete</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- <h1>
        Danh sách đơn hàng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Bill</a></li>
        <li class="active">List</li> -->
<!-- </ol> -->

<!-- Main content -->

<!-- @if (Session::has('message'))
    <div class="alert alert-info"> {{ Session::get('message') }}</div>
    @endif -->
<!-- Default box -->
<!-- <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">ID</th>
                                <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên người order</th>
                                <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Địa chỉ</th>
                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Action</th>
                                <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>Chưa xử lý</td>
                                <td><a href="{{ url('admincp/bill')}}/{{ $customer->id }}/edit">Detail</a></td>
                                <td>
                                    <form action="{{ url('admincp/bill')}}/{{ $customer->id }}/" method="post" id="formDelete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->



@endsection