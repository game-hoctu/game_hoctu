@if(isset($_SESSION['success']))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Thông báo!</strong>
	<ul>
		@foreach ($_SESSION['success'] as $success)
		<li>{{ $success }}</li>
		@endforeach
	</ul>
</div>
<?php unset($_SESSION['success']); ?>
@endif
@if(isset($_SESSION['warning']))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Thông báo!</strong>
	<ul>
		@foreach ($_SESSION['warning'] as $warning)
		<li>{{ $warning }}</li>
		@endforeach
	</ul>
</div>
<?php unset($_SESSION['warning']); ?>
@endif