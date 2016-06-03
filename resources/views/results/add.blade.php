<form method="post" action="{{ url('ajax/results/postAdd') }}">
	<input type="text" name="_token" value="{!! csrf_token() !!}" >
	<input name="result">
	<button type="submit">Gửi</button>
</form>