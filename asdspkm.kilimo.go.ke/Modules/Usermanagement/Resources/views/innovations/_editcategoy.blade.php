<div class="row">
	<form action="{{$url}}" method="post">
		<?=csrf_field();?>
		<div class="form-group">
			<label>Innovation Name</label>
			<input type="text" name="innovation_name" class="form-control" disabled  value="{{$model->inno_name}}">
			
		</div>
		<div class="form-group">
			<label>Category</label>
			<select name="category" class="form-control" required>
				<option value="">---Select Category---</option>

				<?php foreach($categoies  as $category):?>
					<option <?php if($model->innovation_type==$category->category_name):?>selected <?php endif;?>>{{$category->category_name}}</option>


				<?php endforeach;?>
				
			</select>
			
		</div>
		
		<div class="form-group">
			<label>Innovation Type</label>
			<select name="type" class="form-control" required>
				<option value="">--select one--</option>
				<option value="Transformative">Transformative</option>
				<option value="General">General </option>
				
			</select>
			
		</div>
		<div class="form-group">
			<button class="btn btn-sm btn-success form-control">Complete</button>

		</div>