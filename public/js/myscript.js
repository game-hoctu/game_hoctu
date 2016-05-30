$(document).ready(function(){
	$(document).click(function(){
		$(".message").slideUp();
	});
	$('#dataTables-example').DataTable({
		responsive: true
	});
});