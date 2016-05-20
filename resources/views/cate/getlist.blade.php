@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Danh sách Categories</h2></div>
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
                        <table class="table table-hover">
                         <tr>
                             <td>Id</td>
                             <td>Name</td>
                             <!--<td>Password</td>-->
                             <td>Update</td>
                         </tr>
                         <?php foreach($data as $cate):  ?>
                            <tr>
                                <td> <?php echo $cate['cate_id']; ?> </td>
                                <td> <?php echo $cate['name']; ?></td>
                                <td>
                                    <a href='categories/<?php echo $cate['cate_id'];?>/edit'> Edit</a>
                                    <a href='categories/<?php echo $cate['cate_id'];?>/delete'> Delete</a>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
