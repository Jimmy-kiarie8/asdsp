<div class="row">
	<form action="{{$url}}" method="post">
		<?=csrf_field();?>
		<div class="col-md-12">
			<div class="form-group">
			<label>Innovation Name</label>
			<input type="text" name="innovation_name" class="form-control" disabled  value="{{$model->inno_name}}">
			
		</div>
			
		</div>
		<div class="col-md-12">
			<div class="row">

				<div class="form-group col-md-6">
			<label>Adult Male</label>
			<input type="text" name="inno_male_adultvca" class="form-control" value="{{$model->inno_male_adultvca}}">
			
		</div>



		<div class="form-group col-md-6">
			<label>Adult Female</label>
			<input type="text" name="inno_female_adultvca" class="form-control" value="{{$model->inno_female_adultvca}}">
			
		</div>
				

			</div>
			

		</div>


		<div class="col-md-12">
			<div class="row">

				<div class="form-group col-md-6">
			<label>Youth Male</label>
			<input type="text" name="inno_youth_malevca" class="form-control" value="{{$model->inno_youth_malevca}}">
			
		</div>



		<div class="form-group col-md-6">
			<label>Youth Female</label>
			<input type="text" name="inno_youth_femalevca" class="form-control" value="{{$model->inno_youth_femalevca}}">
			
		</div>
				

			</div>
			

		</div>
		
		
		
		
		<div class="form-group">
			<button class="btn btn-sm btn-success form-control">Complete</button>

		</div>