<div class="row">
	<form action="{{$url}}" method="post">
		<?=csrf_field();?>
		<div class="form-group">
			<label>Innovation Name</label>
			<input type="text" name="innovation_name" class="form-control" disabled  value="{{$model->inno_name}}">
			
		</div>
		<div class="form-group">
			<label>Category</label>
			<input type="text" name="innovation_type" class="form-control" disabled  value="{{$model->innovation_type}}">
			
		</div>
		<div class="form-group">
			<button class="btn btn-sm btn-success form-control">Submit For Review</button>

		</div>


		

	</form>
	

</div>