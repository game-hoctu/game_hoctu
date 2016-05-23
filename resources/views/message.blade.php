@if(isset($message))
<div class="alert alert-{{$message['type']}}">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Thông báo!</strong> {{$message['text']}}
</div>
@endif