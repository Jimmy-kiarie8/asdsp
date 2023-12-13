<div class="row">
	<form action="{{$url}}" method="post">
		<?=csrf_field();?>
		<div class="form-group">
			<label>Innovation Name</label>
			<input type="text" name="innovation_name" class="form-control" disabled  value="{{$model->inno_name}}">
			
		</div>


		<div class="form-group">
			<label>Files</label>
			<input type="file" name="file" class="form-control"  required>
			
		</div>
		
		
		
		
		<div class="form-group">
			<button class="btn btn-sm btn-success form-control">Complete</button>

		</div>