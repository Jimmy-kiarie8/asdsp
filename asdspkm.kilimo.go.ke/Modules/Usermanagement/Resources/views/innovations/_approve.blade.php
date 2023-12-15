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
			<label>Mark As</label>
			<select name="publication_status" class="form-control" required>
				<option value="">--select one--</option>
				<option>Approved</option>
				<option>Rejected</option>
				
			</select>
			
		</div>
		<div class="form-group">
			<label>NPS Remarks</label>
			<textarea name="nps_remarks" class="form-control" required></textarea>
			
		</div>
		<div class="form-group">
			<label>is Featured/is Transformative</label>
			<select name="is_featured" class="form-control" required>
				<option value="">--select one--</option>
				<option value="1">Yes</option>
				<option value="0">No</option>
				
			</select>
			
		</div>
		<div class="form-group">
			<button class="btn btn-sm btn-success form-control">Complete</button>

		</div>


		

	</form>
	

</div>