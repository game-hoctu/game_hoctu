@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Cập nhật thông tin thể loại</h2></div>
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
                         <form class="form-horizontal form-row-seperated" action="{{ URL::action('CategoriesController@update') }}"method="Post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ old('cate_id', $getcateById['cate_id'])}}">
                            <div class="form-group">
                                <label for="text">Name</label>
                                <input type="name" class="form-control"
                                       value="{{ old('name', $getcateById['name'])}}" name="name">
                            </div>

                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <button type="submit" class="btn btn-primary"><a href="{{URL::action('CategoriesController@getlistcate')}}"></a>Trở về</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


