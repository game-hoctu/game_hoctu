@extends('app')
@section('title', 'Thông tin đứa trẻ')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Thông tin đứa trẻ</h1>
			<hr/>
		</div>
		<div class="col-md-6">
			<img src="{{CHILD_IMAGE.$data['child']['images']}}" class="img-responsive">
			<h4>Họ tên: {{$data['child']['name']}}</h4>
			<h4>Ngày sinh: {{$data['child']['date_of_birth']}}</h4>
			<h4>Cha mẹ: {{$data['user']['name']}}</h4>
		</div>
		<div class="col-md-6">
		</div>
	</div>
</div>
@endsection
