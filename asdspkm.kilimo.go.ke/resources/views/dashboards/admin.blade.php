@extends("layouts.app")


@section('content')

<div>
        <div class="row row-bg"> <!-- .row-bg -->
                    <div class="col-sm-6 col-md-3">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content">
                                <div class="visual cyan">
                                    <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
                                </div>
                                <div class="title">Innovation Categories</div>
                                <div class="value" id="TotalJobAdvert">-</div>
                                <a class="more" href="{{url('/System/InnovationCategories/Index')}}">View More <i class="pull-right icon-angle-right"></i></a>
                            </div>
                        </div> <!-- /.smallstat -->
                    </div> <!-- /.col-md-3 -->

                    <div class="col-sm-6 col-md-3">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content">
                                <div class="visual green">
                                    <div class="statbox-sparkline">20,30,30,29,22,15,20,30,32</div>
                                </div>
                                <div class="title">Total Uploaded Innovations</div>
                                <div class="value" id="TotalInternalUsers">-</div>
                                <a class="more" href="{{url('/System/Innovations/Index')}}">View More <i class="pull-right icon-angle-right"></i></a>
                            </div>
                        </div> <!-- /.smallstat -->
                    </div> <!-- /.col-md-3 -->

                    <div class="col-sm-6 col-md-3 hidden-xs">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content">
                                <div class="visual yellow">
                                    <i class="icon-dollar"></i>
                                </div>
                                <div class="title">Total Uploaded Success Stories</div>
                                <div class="value" id="TotalApplicants">-</div>
                                <a class="more" href="{{url('/System/SuccessStories/Index')}}">View More <i class="pull-right icon-angle-right"></i></a>
                            </div>
                        </div> <!-- /.smallstat -->
                    </div> <!-- /.col-md-3 -->

                    <div class="col-sm-6 col-md-3 hidden-xs">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content">
                                <div class="visual red">
                                    <i class="icon-user"></i>
                                </div>
                                <div class="title">Total Beneficiaries</div>
                                <div class="value" id="Prioritized">-</div>
                                <a class="more" href="{{url('/System/Publication/Index')}}">View More <i class="pull-right icon-angle-right"></i></a>
                            </div>
                        </div> <!-- /.smallstat -->
                    </div> <!-- /.col-md-3 -->
                </div> <!-- /.row -->




<div class="row">
 <div class="col-lg-12 col-sm-12 mb-12 col-md-12 ">

               <input type="checkbox" name=""  id="AlertSummary" onchange="doalert(this)">Show Summary By Counties

    </div>
     <div class="col-lg-12 col-sm-12 mb-12 col-md-12 ">
  <section class="card hidden showDefalter  alertsummary">
    <div class="card-body"  style="max-height: 250px;overflow: auto;">
                    <table class="table table-bordered table-striped table-hover">
                      
                            <thead>
                                <tr class="success">
                                    <td>#</td>
                                    <td>County</td>
                                    <td>Innovations</td>
                                    <td>Male Adults</th>
                                    <td>Female Adults </td>
                                    <td>Male Youth</td>
                                    <td>Female Youth</td>
                                    <td>Total Male</td>
                                    <td>Total Female</td>
                                    <td>Grand Total</td>
                                </tr>
                            </thead>
                            <tbody id="MyDefaulterList">
                                
                            </tbody>
                       
                        
                    </table>



                </div>
            </section>


</div>

    

</div>





<div class="row">
                     <!-- /.col-md-12 -->
                    <div class="col-md-4" style="margin-top:1%;">
                            <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Innovations Grouped By  Nodes</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group">
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <div id="MaleStat" style="height: 320px;">
                            
                        </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="col-md-4" style="margin-top:1%;">
                            <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Innovations By  Categoies</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group">
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <div id="Qualification" style="height: 320px;">
                            
                        </div>
                            </div>
                        </div>
                        
                        
                    </div>



                   <div class="col-md-4" style="margin-top:1%;">
                            <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Innovations By  Value Chains</h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group">
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <div id="MeberNo" style="height: 320px;">
                            
                        </div>
                            </div>
                        </div>
                        
                        
                    </div>




                     <div class="col-md-6" style="margin-top:1%;">
                            <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Beneficiary Analysis </h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group">
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <div id="GBeneficiary" style="height: 320px;">
                            
                        </div>
                            </div>
                        </div>
                        
                        
                    </div>




                    <div class="col-md-6" style="margin-top:1%;">
                            <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i>Node Beneficiary Analysis </h4>
                                <div class="toolbar no-padding">
                                    <div class="btn-group">
                                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                
                                <div id="Beneficiary" style="height: 320px;">
                            
                        </div>
                            </div>
                        </div>
                        
                        
                    </div>





                    









</div>








@endsection
@push('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link href="{{ asset('/map.css') }}" rel="stylesheet" />
<script src="{{ asset('/map.js')}}" type="text/javascript"></script>
<script type="text/javascript">
	 $("#CountyId").on("change",function(e){
	 	e.preventDefault();
	 	  var id=$(this).val();
             if(id.length>0)
             {
               var url="<?=url('/System/Entities/GetValueChains')?>/"+id;
                 $.get(url,function(data){
                  $("#ValueChain").html(data);
                 });
             }

	 })
</script>

<script type="text/javascript">

    DrawDefaulterList();
    function DrawDefaulterList()
    {
        
     var url="<?=url('/System/Reports/LoadDefault')?>";
     $.get(url,function(data){
        
        $("#MyDefaulterList").html(data);

    })

    }
    

</script>
<script type="text/javascript">

	var url="<?=url('/System/Dashboard/MainData')?>";
	  $.get(url,function(data){
	  	$("#TotalJobAdvert").html(data.Adverts);
	  	$("#TotalInternalUsers").html(data.UserCount);
	  	$("#TotalApplicants").html(data.ApplicantCount);
	  	$("#Prioritized").html(data.JobApplicantions);


	  });






   drawGenderGraph();
	 function drawGenderGraph()
	 {
	 	
	 	  var url="<?=url('/System/Innovations/GetNodeStats')?>";
	 	   $.get(url,function(data){
	 	   	//data=JSON.parse(data);

  Highcharts.chart('MaleStat', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Node Analysis'
    },
    
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Number'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
    },

    series: [
        {
            name: "No of Innovation",
            colorByPoint: true,
            data: data
        }
    ],
    drilldown: {
        series: [
           
            
        ]
    }
});

	 	   })
	 

	 }
	
</script>

<script type="text/javascript">
	 drawCountyTable();

	   function drawCountyTable()
	   {
	   	var id= $("#JobDescription").val();
	 	  var url="<?=url('/System/JobAdvert/GetCountyStats')?>/"+id;
	 	   $.get(url,function(data){
             $("#CountyBody").html(data);
	 	   });

	   }
	
</script>

<script type="text/javascript">
   drawEthinicityGraph();
	 function drawEthinicityGraph()
	 {
	    var url="<?=url('/System/Dashboard/getToptenProductByValue')?>";
	        $.get(url,function(data){
            $("#TableBodyYangu").html(data);
	        });
	 

	 }
	
</script>
<script type="text/javascript">
	
	$("#ValueChain").on("change",function(e){
		e.preventDefault();
		 drawQualification();
		 drawMembership();

	});

   drawQualification();

    drawMembership();

	 function drawMembership()
	 {
	  	 

	 	 var url="<?=url('/System/Dashboard/GetValueChain')?>";
	 	   $.get(url,function(data){
	 	   
           
            Highcharts.chart('MeberNo', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Top 8 Value Chains'
    },
    
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Number'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
    },

    series: [
        {
            name: "No of Innovation",
            colorByPoint: true,
            data: data
        }
    ],
    drilldown: {
        series: [
           
            
        ]
    }
});


	 	   })
	 }
	
	  function drawQualification()
	  {
	  	
       

	  	  var url="<?=url('/System/Dashboard/getStatisticsByTypes')?>";
	  	   $.get(url,function(data){

	  	   	  Highcharts.chart('Qualification', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 1,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Types Analysis'
    },
   
   
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}'
            }
        }
    },
    series: [{
        name: 'Number',
        colorByPoint: true,
        data: data
    }]
});

	  	   });
	  	 

	  }

</script>
<script type="text/javascript">

    Highcharts.chart('Beneficiary', {
    
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 30
        }
    },

    title: {
        text: 'Beneficiary Analysis',
        align: 'left'
    },
    subtitle: {
        text: 'Source: <a ' +
            'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
            'target="_blank">ASDSP Innovation Portal</a>',
        align: 'left'
    },
    xAxis: {
        categories: ['Male Adults', 'Female Adults', 'Male Youth', 'Female Youth'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            borderRadius: '50%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Production',
        data: [631, 727, 3202, 721]
    }, {
        name: 'Tansport',
        data: [814, 841, 3714, 726]
    }, {
        name: 'Trade',
        data: [1044, 944, 4170, 735]
    }, {
        name: 'Processing',
        data: [1276, 1007, 4561, 746]
    }]
});
    

</script>

<script type="text/javascript">


  var url="<?=url('/System/Dashboard/getStatisticsByBeneficiary')?>";

     $.get(url,function(data){

           Highcharts.chart('GBeneficiary', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 30
        }
    },
    title: {
        text: 'Beneficiary Category Analysis',
        align: 'center'
    },
   
    plotOptions: {
        pie: {
            innerSize: 200,
            depth: 45
        }
    },
    series: [{
        name: 'Total',
        data: data
    }]
});


     });







      function doalert(checkboxElem) {
              if (checkboxElem.checked) {
                $(".alertsummary").removeClass("hidden");
                 


              } else {
                 $(".alertsummary").addClass("hidden");
              }
            }

 
    


</script>




@endpush