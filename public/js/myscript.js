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
	$(".search-input").blur(function(){
		$(".search-result").slideUp();
	});
	$(".top").click(function(){
		$("html, body").animate({
			scrollTop: 0
		});
	});
});
var spanImageNum = $(".imageNum");
var imageNum = 0;
var num = 0;
function addImage()
{
	num++;
	imageNum++;
	$(".panel-image").after('<div class="col-sm-6 newImage'+num+'"><div class="panel panel-default panel-body text-center"><div class="form-horizontal" role="form"><div class="form-group"><img class="image image'+num+'" src="'+SERVER_PATH+'public/images/new-image.png" width="100px" height="100px" alt="Upload hình ảnh"/></div><div class="form-group"><label class="control-label col-sm-4">Hình ảnh:</label><div class="col-sm-8"><input type="file" class="form-control fileImage fileImage'+num+'" name="fImage[]" accept="image/*" onchange="addNewImage(this, '+num+')" required/></div></div><div class="form-group"><label class="control-label col-sm-4">Từ ngữ:</label><div class="col-sm-8"><input type="text" class="form-control" name="words[]" required="" placeholder="Từ ngữ cho hình ảnh..."></div></div><a class="btn btn-warning btn-sm removeImage"><span class="glyphicon glyphicon-trash"></span> Xóa ảnh</a></div></div></div>');
	var newImage = $(".newImage"+num);
	newImage.delegate(".removeImage", "click", function () {
		if(imageNum > 1)
		{
			$(this).parent().parent().parent().remove();
			imageNum--;
			showImageNum();
		}
		else
		{
			alert("Không thể xóa, phải upload tối thiểu 1 hình ảnh.");
		}
	});
	newImage.delegate(".image", "click", function (input) {
		newImage.find(".fileImage").click();
	});
	showImageNum();
}
function showImageNum()
{
	spanImageNum.text(imageNum);
}
var addNewImage = function(input, num){
	// var currentFile = $(":file[class='fileImage fileImage"+num+"']");
	// alert( "Index: " + $( ":file" ).index( currentFile ) );
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('.image'+num).attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}