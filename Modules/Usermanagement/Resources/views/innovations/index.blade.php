@extends("layouts.app")


@section('content')
<p>

      <a title="Add New Department" href="<?=url('/System/Innovations/Create')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"><span>New Innovation</a>

                                        <a href="<?=url('/System/Innovations/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Innovations</a>
                                    
</p>


        <div class="row">
          <div class="col-md-12">
            <div class="widget box">
              <div class="widget-header">
                <h4><i class="icon-reorder"></i> List Of Innovations</h4>
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
                                        <th>County</th>
                                        <th>Avatar </th>
                                        <th>VCO Name</th>
                                        <th>Innovation Name</th>
                                        
                                        <th>Value Chain</th>
                                        <th>Node</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Cost</th>
                                        <th>VC Promoted </th>
                                        <th>Male</th>
                                        <th>Female</th>
                                        <th>Youth</th>
                                        
                                        <th>Sub County</th>
                                        <th>Ward</th>
                                        <th>Location</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Contact Name</th>
                                        <th>Contact Tel</th>
                                        <th>Submit Status</th>
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
         columnDefs: [{
                            render: function (data, type, full, meta) {
                                return "<div id='dvNotes' style='white-space: normal;width: 200px;'>" + data + "</div>";
                            },
                            targets: [3,4]
                        },
                        



                        ],
        "order": [[ 22, "desc" ]],
        ajax: {
            url: '<?=url("System/Innovations/fetchList")?>',
             'type': 'POST',  
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
          },
          columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'county_name', name: 'county_name'},
            {data: 'inno_cover_image', name: 'inno_cover_image'},
            {data: 'vco_name', name: 'vco_name'},
            {data: 'inno_name', name: 'inno_name'},
          
            {data: 'value_name', name: 'value_name'},
            {data: 'node_name', name: 'node_name'},
              {data: 'innovation_type', name: 'innovation_type'},
            {data: 'innovation_status', name: 'innovation_status'},
            {data: 'inno_cost', name: 'inno_cost'},
            {data: 'inno_vca_benefit', name: 'inno_vca_benefit'},
            {data: 'inno_male_vca', name: 'inno_male_vca'},
            {data: 'inno_female_vca', name: 'inno_female_vca'},
            {data: 'inno_youth_vca', name: 'inno_youth_vca'},
            
            {data: 'inno_subcounty', name: 'inno_subcounty'},
            {data: 'inno_ward', name: 'inno_ward'},
            {data: 'inno_location', name: 'inno_location'},
            {data: 'inno_latitude', name: 'inno_latitude'},
            {data: 'inno_longitude', name: 'inno_longitude'},
            {data: 'inno_contactname', name: 'inno_contactname'},
            {data: 'inno_contacttel', name: 'inno_contacttel'},
            {data: 'publish_status', name: 'publish_status'},
            {data: 'created_at', name: 'created_at'},
            
            
            ],

            dom: 'Bfrtip',

        buttons: [
            { 
      extend: 'excelHtml5',
      className:'btn btn-sm btn-danger',
      exportOptions: {
               columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn btn-sm btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn btn-sm btn-info',
        exportOptions: {
            columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
                
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