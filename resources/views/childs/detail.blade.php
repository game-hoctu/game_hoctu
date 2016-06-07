@extends('app')
@section('title', 'Thông tin đứa trẻ')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-leaf"></span> Thông tin đứa trẻ</h1>
		</div>
		<div class="col-md-5">
			<img src="{{$data['child']['image']}}" class="img-responsive img-thumbnail">
			<h4><span class="glyphicon glyphicon-tag"></span> Họ tên: {{$data['child']['name']}}</h4>
			<h4><span class="glyphicon glyphicon-tag"></span>
			Ngày sinh: {{Carbon\Carbon::parse($data['child']['date_of_birth'])->format('d/m/Y')}}</h4>
			<h4><span class="glyphicon glyphicon-tag"></span> Giới tính:
				<span ng-show="{{$data['child']['sex']}}== 0">Nam</span>
				<span ng-show="{{$data['child']['sex']}} == 1">Nữ</span>
			</h4>
			<h4><span class="glyphicon glyphicon-tag"></span> Cha mẹ: {{$data['user']['name']}}</h4>
			<h4><span class="glyphicon glyphicon-tag"></span> Tổng số điểm hiện tại: {{$data['score']}}</h4>
			<h4>
				<a href="{{url('childs/'.$data['child']['id'].'/edit')}}" class="btn btn-success btn"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
				<a href="{{url('childs/'.$data['child']['id'].'/delete')}}" class="btn btn-danger btn" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span> Xóa</a>
			</h4>
		</div>
		<div class="col-md-7">
			@if(count($data['results']) > 0)
			<div id="listResult" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php $i = 0; $active="active";?>
					@foreach($data['results'] as $result)
					<li data-target="#{{$result['images_id']}}" data-slide-to="{{$i}}" class="{{$active}}"></li>
					<?php $i++; $active="";?>
					@endforeach
				</ol>

				<div class="carousel-inner">
					<?php $active="active";?>
					@foreach($data['results'] as $result)
					<?php $url = $result['url'];?>
					<div class="item {{$active}}">
						<img src="{{UPLOAD_FOLDER.$url}}" class="img-thumbnail img-responsive" alt="{{$result['word']}}">
						<div class="carousel-caption incorrect-top">
							<div class="list-word">
								@for($i = 0; $i < strlen($result['incorrect']); $i+=2)
								<div class="incorrect-word incorrect-word-top">
									{{$result['incorrect'][$i]}}
								</div>
								@endfor
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="carousel-caption incorrect-bottom">
							<div class="list-word">
								@for($i = 1; $i < strlen($result['incorrect']); $i+=2)
								<?php if($i==1) $flag = "incorrect-flag"; ?>
								<div class="incorrect-word incorrect-word-bottom {{$flag}}">
									{{$result['incorrect'][$i]}}
								</div>
								<?php $flag = ""; ?>
								@endfor
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="carousel-caption">
							<h4>Đáp án: {{$result['word']}}</h4>
							<div class="list-word">
								@for($i = 0; $i < strlen($result['correct']); $i++)
								<div class="correct-word">
									{{$result['correct'][$i]}}
								</div>
								@endfor
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<?php $active="";?>
					@endforeach
				</div>

				<a class="left carousel-control" href="#listImage" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#listImage" data-slide="next">
					<span class="icon-next"></span>
				</a>
			</div>
			@endif
		</div>
		<div class="col-md-12">
			<h2>Bảng kết quả</h2>
			<hr/>
			@if(count($data['results']) == 0)
			<p class="alert alert-warning">Bé chưa trả lời hình ảnh nào cả!</p>
			@else
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>Mã hình ảnh</th>
							<th>Từ ngữ</th>
							<th>Bé trả lời</th>
							<th>Những chữ bé sai</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data['results'] as $result)
						<tr>
							<td>{{$result['images_id']}}</td>
							<td>{{$result['word']}}</td>
							<td>{{$result['correct']}}</td>
							<td>{{$result['incorrect']}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endif

		</div>
	</div>
</div>
@endsection
