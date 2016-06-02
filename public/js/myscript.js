$(document).ready(function(){
	$(document).click(function(){
		$(".message").slideUp();
	});
	$(".search-input").on('keypress',function(e){
		$(".search-result").fadeIn();
	});
});