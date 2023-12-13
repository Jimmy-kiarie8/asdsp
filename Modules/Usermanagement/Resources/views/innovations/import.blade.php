@extends("layouts.app")


@section('content')


<!--=== Blue Chart ===-->
<p>
  

   <a title="Add New Department" href="<?=url('/System/Innovations/Create')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"><span>New Innovation</a>

                                        <a href="<?=url('/System/Innovations/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Innovations</a>



                                          <a href="<?=url('/System/Innovations/Import')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>Import</a>




      </p>

      <div class="row">
        <div class="col-md-12">
          <div class="widget box">
            <div class="widget-header">
              <h4><i class="icon-reorder"></i>Import Innovations </h4>
              <div class="toolbar no-padding">
                <div class="btn-group">
                  <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                </div>
              </div>
            </div>
            <div class="widget-content"> 
             <form role="form" action="{{$url}}" method="post"  enctype="multipart/form-data">
              <?=csrf_field()?>



              <div class="row">
                <div class="form-group col-md-6">
                  <label>County</label>

                  {{ Form::select('county_id',([null=>'--Select County--'] + $county), $model->county_id, ['class'=>'form-control','required'=>'required','id'=>'County','style'=>'width:100%']) }}


                </div>


              </div>
               
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Select File</label>

                  <input type="file"
                  class="form-control" name="file_name" placeholder="Ward"  required >


                </div>


              </div>


              <div class="row">
                <div class="form-group col-md-6">
                  <button class="btn btn-info"><?=($model->exists)?"Update":"Create"?></button>
                </div>
              </div>




            </form>


          </div>
        </div>
      </div>
    </div>




    


    @stop
    @push('scripts')
    <script>


    </script>
    
    @endpush