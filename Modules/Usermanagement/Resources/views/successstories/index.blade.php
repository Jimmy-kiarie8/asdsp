@extends("layouts.app")


@section('content')
<p>

     <a title="Add Success Story" href="<?=url('/System/SuccessStories/Create')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"><span>New Success SStory</a>

                                        <a href="<?=url('/System/SuccessStories/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Success Stories</a>
                                    
</p>


        <div class="row">
          <div class="col-md-12">
            <div class="widget box">
              <div class="widget-header">
                <h4><i class="icon-reorder"></i> List Of Success Stories</h4>
                <div class="toolbar no-padding">
                  <div class="btn-group">
                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                  </div>
                </div>
              </div>
              <div class="widget-content"> 
                <div class="table-responsive" style="overflow-x:auto;">
                   <table class="table table-striped table-bordered table-hover "  id="role-datatable"  style="width:100%;">
                     <thead>
                                    <tr class="btn-success">
                                       
                                        <th>Action</th>
                                        <th>Avatar </th>
                                        <th>Innovation Name</th>
                                        <th>location</th>
                                        <th>Publish Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>


                  
                </table>
                  
                </div>
               
              </div>
            </div>
          </div>
        </div>
      



    


@stop
@push('scripts')
     <script>
        
          
       $('#role-datatable').DataTable({
        processing: true,
        serverSide: true,
         pageLength:50,
        "order": [[ 5, "desc" ]],
        ajax: {
            url: '<?=url("System/SuccessStories/fetchList")?>',
             'type': 'POST',  
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
          },
          columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'story_cover_image', name: 'story_cover_image'},
            {data: 'story_title', name: 'story_title'},
            {data: 'story_location', name: 'story_location'},
            
            {data: 'publish_status', name: 'publish_status'},
            {data: 'created_at', name: 'created_at'},
            
            
            ],

            dom: 'Bfrtip',

        buttons: [
            { 
      extend: 'excelHtml5',
      className:'btn-danger',
      exportOptions: {
               columns: [1,2,3,4,5]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2,3,4,5]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn-info',
        exportOptions: {
            columns: [1,2,3,4,5]
                
            },
           text: '<span >Print</span>',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
        }},
        ],
        });
    </script>
    
@endpush