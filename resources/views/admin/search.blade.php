<div class="row">
	<div class="col-sm-6">
		<span ng-show="data != undefined">Có tất cả <%data.length%> mục.</span>
	</div>
	<div class="col-sm-6 text-right">
		<div class="form-group form-inline">
			<label class="form-label">Lọc nội dung:</label>
			<input class="form-control" type="text" name="search" ng-model="search">
		</div>
	</div>
</div>