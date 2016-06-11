@extends('app')
@section('title','Lỗi 404! Không tìm thấy nội dung')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <img class="img-responsive" src="{{SERVER_PATH.'public/images/404.jpg'}}" width="100%">
            <h1>Không tìm thấy nội dung truy cập!</h1>
            <a href="{{url('/')}}" class="btn btn-primary btn-lg">Về trang chủ!</a>
        </div>
    </div>
</div>
@endsection
