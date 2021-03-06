@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->email}}</small>
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/user/sua" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Category Name"  value="{{$user->full_name}}"/>
                    </div>
                    <div class="form-group">
                        <label>mail</label>
                        <input class="form-control" name="email" placeholder="Please Enter Category Order"  value="{{$user->email}}" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Adress</label>
                        <input class="form-control" name="address" placeholder="Please Enter Category Adess"  value="{{$user->address}}"/>
                    </div>
                    <div class="form-group">
                        <label>phone</label>
                        <input class="form-control" name="phone" placeholder="Please Enter Category phone number" value="{{$user->phone}}"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Please Enter Category password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input class="form-control" type="password" name="re_password" placeholder="Please Enter Category re password" />
                    </div>

                    <button type="submit" class="btn btn-default">User Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection