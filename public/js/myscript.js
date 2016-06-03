$(document).ready(function(){
	$(document).click(function(){
		$(".message").slideUp();
	});
	$(".search-input").on('keypress',function(e){
		$(".search-result").fadeIn();
	});
	$(".removeImg").click(function(event){
		console.log("Click remove");
		$(this).parent().parent().parent().remove();
		num--;
		$(".numImg").text(num);
	});
	var num = 1;
	$(".numImg").text(num);
	$(".panel-image").after('<div class="col-sm-6"><div class="panel panel-default panel-body text-center"><div class="form-horizontal" role="form"><div class="form-group"><label class="control-label col-sm-4">Hình ảnh:</label><div class="col-sm-8"><input type="file" accept="image/*" class="form-control" name="fImage[]" required></div></div><div class="form-group"><label class="control-label col-sm-4">Từ ngữ:</label><div class="col-sm-8"><input type="text" class="form-control" name="words[]" required="" placeholder="Nhập từ ngữ..."></div></div><hr/><a class="btn btn-warning btn-sm removeImg"><span class="glyphicon glyphicon-remove"></span> Xóa ảnh</a></div></div></div>');
	num++;
	$(".addImage").click(function(){
		
		$(".numImg").text(num);
		$(".panel-image").after('<div class="col-sm-6"><div class="panel panel-default panel-body text-center"><div class="form-horizontal" role="form"><div class="form-group"><label class="control-label col-sm-4">Hình ảnh:</label><div class="col-sm-8"><input type="file" accept="image/*" class="form-control" name="fImage[]" required></div></div><div class="form-group"><label class="control-label col-sm-4">Từ ngữ:</label><div class="col-sm-8"><input type="text" class="form-control" name="words[]" required="" placeholder="Nhập từ ngữ..."></div></div><hr/><a class="btn btn-warning btn-sm removeImg"><span class="glyphicon glyphicon-remove"></span> Xóa ảnh</a></div></div></div>');
		num++;
	});

});