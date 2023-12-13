@extends("layouts.app")


@section('content')



        <!--=== Blue Chart ===-->
           <p>
                                    <a data-title="Add New Innovation Categories" data-url="<?=url('/System/InnovationCategories/Create')?>" class="btn btn-sm btn-info reject-modal"><span class="fa fa-plus"><span>Add New Category</a>

                                        <a href="<?=url('/System/InnovationCategories/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of  Categories </a>



                                </p>

        <div class="row">
          <div class="col-md-12">
            <div class="widget box">
              <div class="widget-header">
                <h4><i class="icon-reorder"></i> List Of Innovation Categories</h4>
                <div class="toolbar no-padding">
                  <div class="btn-group">
                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                  </div>
                </div>
              </div>
              <div class="widget-content"> 
                <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover "  id="role-datatable"  style="width:100%;">
                     <thead>
                                    <tr class="btn-success">
                                       
                                        <th>Action</th>
                                        <th>Category Name</th>
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
        "order": [[ 2, "desc" ]],
      
           ajax: '<?=url("System/Categories/fetchList")?>',
          columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'category_name', name: 'category_name'},
            {data: 'created_at', name: 'created_at'},
            ],

            dom: 'Bfrtip',

        buttons: [
            { 
      extend: 'excelHtml5',
      className:'btn btn-sm btn-danger',
      exportOptions: {
               columns: [1,2]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn btn-sm btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn btn-sm btn-info',
        exportOptions: {
            columns: [1,2]
                
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