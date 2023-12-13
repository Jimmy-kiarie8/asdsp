@extends("layouts.app")


@section('content')



        <!--=== Blue Chart ===-->
         

        <div class="row">
          <div class="col-md-12">
            <div class="widget box">
              <div class="widget-header">
                <h4><i class="icon-reorder"></i> List Of  Member Products</h4>
                <div class="toolbar no-padding">
                  <div class="btn-group">
                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                  </div>
                </div>
              </div>
              <div class="widget-content"> 
              
                   <div class="table-responsive"  style="overflow-x:auto;">
                   
                   <table class="table table-striped table-bordered table-hover "  id="Orgdatatable"  style="width:100%;">
                     <thead>
                                    <tr class="btn-success">
                                       
                                        <th>Action</th>
                                         <th>Value Chain</th>
                                        <th>Variety</th>
                                        <th>Quantity</th>
                                        <th>UOM</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Unit Price</th>
                                        <th>Number</th>
                                        <th>Member Name</th>
                                        <th>Telephone</th>
                                         <th>VCO Group Name</th>
                                          <th>County</th>
                                      
                                        
                                       
                                       
                                        
                                       
                                       
                                        
                                        
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
        
          
       $('#Orgdatatable').DataTable({
        processing: true,
        serverSide: true,
         pageLength:50,
        "order": [[ 6, "desc" ]],
           ajax: '<?=url("System/MemberProducts/fetchAdminList")?>',
          columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'value_name', name: 'value_name'},
            {data: 'variety', name: 'variety'},
            {data: 'quantity_available', name: 'quantity_available'},
            {data: 'uom', name: 'uom'},
            {data: 'product_color', name: 'product_color'},
            {data: 'product_size', name: 'product_size'},
            {data: 'unit_price', name: 'unit_price'},
            {data: 'member_number', name: 'member_number'},
            {data: 'member_name', name: 'member_name'},
            {data: 'member_telephone', name: 'member_telephone'},
            {data: 'org_name', name: 'org_name'},
            {data: 'county_name', name: 'county_name'},
            ],

            dom: 'Bfrtip',

        buttons: [
            { 
      extend: 'excelHtml5',
      className:'btn-danger',
      exportOptions: {
               columns: [1,2,3,4,5,6,7,8,9,10]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2,3,4,5,6,7,8,9,10]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn-info',
        exportOptions: {
            columns: [1,2,3,4,5,6,7,8,9,10]
                
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