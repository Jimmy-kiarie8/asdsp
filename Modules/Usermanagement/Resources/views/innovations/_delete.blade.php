<div class="row">
	<form action="{{$url}}" method="post">
		<?=csrf_field();?>
		<div class="col-md-12">
			<div class="row">
			<div class="form-group">
			<label>Innovation Name</label>
			<input type="text" name="innovation_name" class="form-control" disabled  value="{{$model->inno_name}}">
		</div>
			
		</div>
			
		</div>
		<div class="col-md-12">
			<div class="row">
				<input type="checkbox" name="confirm" required>Confirm to Delete Selected Innovation

			
		</div>
	</div>




		



		
		
		
		
		<div class="form-group">
			<button class="btn btn-sm btn-success form-control">Complete</button>

		</div>