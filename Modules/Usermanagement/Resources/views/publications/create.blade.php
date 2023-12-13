@extends("layouts.app")


@section('content')



    
         <p>
                                    <a title="Add Success Story" href="<?=url('/System/Publication/Create')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"><span>New Publication</a>

                                        <a href="<?=url('/System/Publication/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Publication</a>

                                      




                                </p>


        <div class="row">
          <div class="col-md-12">
            <div class="widget box">
              <div class="widget-header">
                <h4><i class="icon-reorder"></i>Create New  Publication</h4>
                <div class="toolbar no-padding">
                  <div class="btn-group">
                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                  </div>
                </div>
              </div>
              <div class="widget-content"> 
              
                   <form action="{{$url}}" method="post"  enctype="multipart/form-data">

                      <?=csrf_field()?>


                        <div class="col-md-12">
                          <div class="row">



                            
                         
                           <div class="col-md-8">
                            <div class="row">
                    <div class="form-group col-md-12">
                    <label>Publication Title </label>
                    <input type="text" name="publication_title"  class="form-control" required   value="{{old('publication_title')}}">
                  </span>
                </div>


                  <div class="form-group col-md-12">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label>Author Name</label>
                        <input type="text" name="author_name"  class="form-control" required   value="{{old('author_name')}}">
                        
                      </div>


                      <div class="form-group col-md-6">
                    <label>Categoy</label>
                  {{ Form::select('category',([null=>'--Select Categoy--'] + array("Journal"=>"Journal","Report"=>"Report","Strategic Plan"=>"Stategic Plan","Bulletin"=>"Bulletin")), $model->county_id, ['class'=>'form-control','required'=>'required','id'=>'County','style'=>'width:100%']) }}
                  </span>
         </div>
                      
                    </div>



                </div>


                 <div class="form-group col-md-12">
                    <div class="row">


                      <div class="form-group col-md-6">
                    <label>Language</label>
                  {{ Form::select('langauge',([null=>'--Select Langauge--'] + array("English"=>"English","Swahili"=>"Swahili","French"=>"French")), $model->county_id, ['class'=>'form-control','required'=>'required','id'=>'County','style'=>'width:100%']) }}
                  </span>
                </div>
                      <div class="col-md-6 form-group">
                        <label>Publisher Name</label>
                        <input type="text" name="publisher"  class="form-control" required   value="{{old('publisher')}}">
                        
                      </div>


                      
                    </div>
              </div>



               <div class="form-group col-md-12">
                    <div class="row">


                      <div class="form-group col-md-6">
                    <label>Rights</label>
                  {{ Form::select('rights',([null=>'--Select --'] + array("Attribution-NonCommercial"=>"Attribution-NonCommercial")), $model->rights, ['class'=>'form-control','required'=>'required','id'=>'County','style'=>'width:100%']) }}
                  </span>
                </div>
                      <div class="col-md-6 form-group">
                        <label>License</label>
                        <input type="text" name="license"  class="form-control" value="{{old('license')}}">
                        
                      </div>


                      
                    </div>
              </div>

 

       
                      
                            
                          </div>
                        </div>

                          <div class="col-md-4">
                            <label>Cover Image</label>
                             <div>
                  <img name="images" width="200" height="320" id="image_array1" value="" src="{{asset('placeholder.png')}}" style="width: 100%;height: 200px;" />
                  <!--<div id="image_array1"   ></div> Use This if You want to display Multiple Images--> 
                  <input type="hidden" class="form-control validate" name="primary_image" value="" id="img_id_cover" required>
                  <br/>
                  <a href="#modal-message" class="uploadmodalwidget btn btn-default btn-sm" data-toggle="modal" id="uploadmodal" data-inputid="img_id_cover" data-mode="single" data-divid="image_array1" style="position: absolute;z-index: 1;">Upload Image</a>
                   <!-- Change Data Mode to Multiple if you want to be able to select Multiple Images -->                                   
               
                </div>
                             
                           </div>
                             
                         </div>



<div class="row"  style=",margin-top: 5%;">

      <div class="form-group col-md-12">
            <label>Publication Attachment</label>
            <input type="file" name="file" required>
         </div>
                               
        

         <div class="form-group col-md-12">
            <label>Publication Description</label>
            <textarea rows="10" name="publication_description" class="form-control" required  id="Description">{{old('publication_description')}}</textarea>
         </div>
</div>










                          
  </div>

 
                          



                          



                           
                             
                          

                         
                        

                          


                            <div class="form-group col-md-12"  style="margin-top:5%;">
                              <div class="row">
                              <button class="btn btn-success">Create</button>
         </div>
                            
                          </div>

                            


                          
                        </div> 
                    


                  </form>
               
              </div>
            </div>
          </div>
        </div>
      



   
@include('partials.upload_widget')


@stop
@push('scripts')
<script src="{{ asset ('http://cdn.ckeditor.com/4.5.7/standard/ckeditor.js')}}" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
     <script>

      CKEDITOR.replace('Description', { height:300 });
        
      
        $( "#datePicker" )
        .datepicker({
          defaultDate: "+0w",
          changeMonth: true,
          changeYear:true,
          numberOfMonths: 1
        });
          
      </script>
    
@endpush