@extends('app')
@section('title','Lỗi 404! Không tìm thấy nội dung')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <img src="{{SERVER_PATH.'public/images/404.jpg'}}">
            <h1>Không tìm thấy nội dung bạn truy cập!</h1>
            <a href="{{url('/')}}" class="btn btn-primary btn-lg">Về trang chủ!</a>
        </div>
    </div>
</div>
@endsection
