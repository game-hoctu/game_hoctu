$(document).ready(function(){
	$(document).click(function(){
		$(".message").slideUp();
	});
	$(".search-input").on('keypress',function(e){
		$(".search-result").fadeIn();
	});
	addImage();
	$(".addImage").click(function(){
		addImage();
	});
	$(".search-input").focus(function(){
		$(".search").animate({
			'max-width': '350px'
		});
	});
	$(".search-input").blur(function(){
		$(".search").animate({
			'max-width': '150px'
		});
		$(this).val("");
		$(".search-result").slideUp();
	});
});

function addImage()
{
	$(".panel-image").after('<div class="col-sm-6"><div class="panel panel-default panel-body text-center"><div class="form-horizontal" role="form"><div class="form-group"><label class="control-label col-sm-4">Hình ảnh:</label><div class="col-sm-8"><input type="file" accept="image/*" class="form-control" name="fImage[]" required></div></div><div class="form-group"><label class="control-label col-sm-4">Từ ngữ:</label><div class="col-sm-8"><input type="text" class="form-control" name="words[]" required="" placeholder="Nhập từ ngữ..."></div></div><hr/><a class="btn btn-warning btn-sm removeImage"><span class="glyphicon glyphicon-trash"></span> Xóa ảnh</a></div></div></div>');
	$(".removeImage").on("click", function () {
		$(this).parent().parent().parent().remove();
	});
}