@extends('app')
@section('title', 'Thông tin đứa trẻ')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="title-bar"><span class="glyphicon glyphicon-leaf"></span> Thông tin đứa trẻ</h1>
		</div>
		<div class="col-md-5">
			<img src="{{$data['child']['image']}}" class="img-responsive img-thumbnail" width="100%">
			<div class="row">
				<div class="col-md-6 text-center">
					{!! QrCode::size(200)->generate($data['child']['id']); !!}
				</div>
				<div class="col-md-6">
					<h4><span class="glyphicon glyphicon-tag"></span> ID: {{$data['child']['id']}}</h4>
					<h4><span class="glyphicon glyphicon-tag"></span> Họ tên: {{$data['child']['name']}}</h4>
					<h4><span class="glyphicon glyphicon-tag"></span> Ngày sinh: {{Carbon\Carbon::parse($data['child']['date_of_birth'])->format('d/m/Y')}}</h4>
					<h4><span class="glyphicon glyphicon-tag"></span> Giới tính:
						<span ng-show="{{$data['child']['sex']}}== 0">Nam</span>
						<span ng-show="{{$data['child']['sex']}} == 1">Nữ</span>
					</h4>
					<h4><span class="glyphicon glyphicon-tag"></span> Cha mẹ: {{$data['user']['name']}}</h4>
					<h4><span class="glyphicon glyphicon-tag"></span> Tổng số điểm: {{$data['score']}}</h4>
					<h4>
						<a href="{{url('childs/'.$data['child']['id'].'/edit')}}" class="btn btn-success btn"><span class="glyphicon glyphicon glyphicon-edit"></span> Sửa</a>
						<a href="{{url('childs/'.$data['child']['id'].'/delete')}}" class="btn btn-danger btn" onclick="return confirm('Bạn có chắc chắc muốn xóa?')"><span class="glyphicon glyphicon glyphicon-trash"></span> Xóa</a>
					</h4>
					<?php $load = Share::load(Request::url(), 'Bé '.$data['child']['name'].' của '.$data['user']['name'].' - KidLeen')->services();?>
					<h4>
						<a target="_blank" href="{{$load['facebook']}}"><img width="30px" src="{{SERVER_PATH}}public/images/fb-icon.png" alt="Share Facebook"></a>
						<a target="_blank" href="{{$load['twitter']}}"><img width="30px" src="{{SERVER_PATH}}public/images/tt-icon.png" alt="Share Twitter"></a>
						<a target="_blank" href="{{$load['gplus']}}"><img width="30px" src="{{SERVER_PATH}}public/images/gg-icon.png" alt="Share Google Plus"></a>
					</h4>
				</div>
			</div>
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
								@for($i = 0; $i < 10; $i+=2)
								<div class="incorrect-word incorrect-word-top">
									@if($i < strlen($result['incorrect']))
									{{$result['incorrect'][$i]}}
									@else
									<span> </span>
									@endif
								</div>
								@endfor
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="carousel-caption incorrect-bottom">
							<div class="list-word">
								@for($i = 1; $i < 10; $i+=2)
								<?php if($i==1) $flag = "incorrect-flag"; ?>
								<div class="incorrect-word incorrect-word-bottom {{$flag}}">
									@if($i < strlen($result['incorrect']))
									{{$result['incorrect'][$i]}}
									@else
									<span> </span>
									@endif
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
								@if($result['correct'][$i] != "")
								<div class="correct-word correct-word-done">
									{{$result['correct'][$i]}}
								</div>
								@else
								<div class="correct-word">
									{{$result['correct'][$i]}}
								</div>
								@endif
								@endfor
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<?php $active="";?>
					@endforeach
				</div>

				<a class="left carousel-control" href="#listResult" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#listResult" data-slide="next">
					<span class="icon-next"></span>
				</a>
			</div>
			@endif
		</div>
		<div class="col-md-12">
			<h2 class="title-bar">Bảng kết quả</h2>
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
</div>
@endsection
