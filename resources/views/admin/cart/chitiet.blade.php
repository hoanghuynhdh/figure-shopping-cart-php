@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết đơn hàng
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container123  col-md-6" style="">
                                <h4></h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-md-4">Thông tin khách hàng</th>
                                            <th class="col-md-6"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Thông tin người đặt hàng</td>
                                            <td>{{ $customerInfo->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt hàng</td>
                                            <td>{{ $customerInfo->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $customerInfo->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $customerInfo->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $customerInfo->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ghi chú</td>
                                            <td>{{ $customerInfo->hoadon_note }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting col-md-1">STT</th>
                                        <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                        <th class="sorting col-md-2">Số lượng</th>
                                        <th class="sorting col-md-2">Giá tiền</th>
                                </thead>
                                <tbody>
                                    @foreach($billInfo as $key => $bill)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $bill->sanpham_name }}</td>
                                        <td>{{ $bill->soluong }}</td>
                                        <td>{{ number_format($bill->price) }} VNĐ</td>
                                    </tr>
                                    @endforeach -->
                                    <tr>
                                        <td colspan="3"><b>Tổng tiền</b></td>
                                        <td colspan="1"><b class="text-red">{{ number_format($customerInfo->hoadon_total) }} VNĐ</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ url('admin/bill') }}/{{ $customerInfo->hoadon_id }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="form-inline">
                                    <label>Trạng thái giao hàng: </label>
                                    <select name="status" class="form-control input-inline" style="width: 200px">
                                        <option value="1">Chưa giao</option>
                                        <option value="2">Đang giao</option>
                                        <option value="2">Đã giao</option>
                                    </select>

                                    <input type="submit" value="Xử lý" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection