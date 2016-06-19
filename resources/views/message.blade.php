@if(Session::has('success'))
<div class="message alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Thông báo!</strong> {{Session::get('success')}}
</div>
{{Session::forget('success')}}
@endif
@if(Session::has('warning'))
<div class="message alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Thông báo!</strong> {{Session::get('warning')}}
</div>
{{Session::forget('warning')}}
@endif