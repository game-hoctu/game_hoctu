@extends('app')
@section('title','Cập nhập thông tin ')
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
                         <form class="form-horizontal form-row-seperated" action="{{ URL::action('UsersController@update') }}"method="Post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ old('id', $getUserById['id'])}}">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Email:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" disabled="disabled" 
                                       value="{{ old('email', $getUserById['email'])}}" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"
                                           value="{{ old('name', $getUserById['name'])}}" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                    <button type="submit" class="btn btn-default"><a href="{{URL::action('UsersController@edit')}}"></a>Trở về</button>
                                </div>
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


