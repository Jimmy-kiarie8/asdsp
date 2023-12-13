<div class="row">
	<form action="{{$url}}" method="post">
		 <?=csrf_field()?>
		 <div class="col-md-12 form-group">
		 	<label>Category Name</label>
		 	<input type="text" name="category_name" class="form-control" value="{{$model->category_name}}"  required>
		 	
		 </div>

		  <div class="col-md-12 form-group">
		   <button class="btn btn-sm btn-success form-control"><?=($model->exists) ?"Update":"Create"?></button>
		 	
		 </div>
		

	</form>
	

</div>