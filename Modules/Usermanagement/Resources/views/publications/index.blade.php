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
                <h4><i class="icon-reorder"></i> List Of Publications</h4>
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
                                        <th>Categoy</th>
                                        <th>Publication Title</th>
                                         <th>Author</th>
                                         <th>Publisher</th>
                                         <th>Status</th>
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
        "order": [[ 6, "desc" ]],
      
           ajax: '<?=url("System/Publication/fetchList")?>',
          columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'category', name: 'category'},
            {data: 'publication_title', name: 'publication_title'},
            {data: 'author', name: 'author'},
            {data: 'publisher', name: 'publisher'},
            {data: 'publish_status', name: 'publish_status'},
            {data: 'created_at', name: 'created_at'},
            ],

            dom: 'Bfrtip',

        buttons: [
            { 
      extend: 'excelHtml5',
      className:'btn btn-sm btn-danger',
      exportOptions: {
               columns: [1,2,4,3,5,6]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn btn-sm btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2,4,3,5]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn btn-sm btn-info',
        exportOptions: {
            columns: [1,2,4,3,5]
                
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