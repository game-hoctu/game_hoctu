<!--<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
</head>
<body>

</body>
</html>-->
@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Cập nhật thông tin</h2></div>
                <div class="panel-body">
                    <!-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Thông báo!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->

                    <div class="col-xs-8 col-xs-offset-2" style="margin-top:50px;">
                         <form class="form-horizontal form-row-seperated" action="{{ URL::action('ParentsController@update') }}"method="Post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ old('parent_id', $getParentById['parent_id'])}}">
                            <div class="form-group">
                                <label for="email">UserName</label>
                                <input type="email" class="form-control"
                                       value="{{ old('email', $getParentById['email'])}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="fullname">FullName</label>
                                <input type="text" class="form-control" value="{{old('fullname',$getParentById['fullname'])}}" name="fullname">
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                            <button type="submit" class="btn btn-primary"><a href="{{URL::action('ParentsController@getlist')}}"></a>Trở về</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


