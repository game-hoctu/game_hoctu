@extends('app')
@section('title','Sủa thông tin cá nhân')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title-bar">Thông tin cá nhân</h1>
            @include('message')

            <form class="form-horizontal" role="form" method="POST" action="{{ route('postedit') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                <label class="col-md-4 control-label">Mã số:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" disabled="" value="{{ old('id', $getuserById['id'])}}">
                        <input type="hidden" class="form-control" name="id" value="{{ old('id', $getuserById['id'])}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Email:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" disabled="" name="email" value="{{ old('email', $getuserById['email'])}}" required="">
                        <!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Họ tên:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $getuserById['name'])}}" required="">
                        <!--<label class="label label-danger">{!! $errors->first('txttenalbum') !!}</label>-->

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Giới tính: </label>
                    <div class="col-md-6">
                        <select name="role" class="form-control">
                            <option value="0" ng-selected="data.sex == 0">Nam</option>
                            <option value="1" ng-selected="data.sex == 1">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Địa chỉ:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="address" value="{{ old('address', $getuserById['address'])}}" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                        <a class="btn btn-default" href="{{url('users/myProfile')}}">Trở về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
