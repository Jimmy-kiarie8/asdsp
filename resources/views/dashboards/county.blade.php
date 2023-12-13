@extends("layouts.app")


@section('content')


			




@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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

	var url="<?=url('/System/Dashboard/MainData')?>";
	  $.get(url,function(data){
	  	$("#TotalJobAdvert").html(data.Adverts);
	  	$("#TotalInternalUsers").html(data.UserCount);
	  	$("#TotalApplicants").html(data.ApplicantCount);
	  	$("#TotalJobApplications").html(data.JobApplicantions);


	  });






   drawGenderGraph();
	 function drawGenderGraph()
	 {
	 	
	 	  var url="<?=url('/System/Node/GetGenStats')?>";
	 	   $.get(url,function(data){
	 	   	//data=JSON.parse(data);

	 	   		Highcharts.chart('MaleStat', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 1,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'No of VCOs'
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

	 function drawMembership()
	 {
	 	 	var CountyId= $("#CountyId").val();
	  	var ValueChain=$("#ValueChain").val();
	  	 

	 	 var url="<?=url('/System/Dashboard/GetMonthStats')?>";
	 	   $.get(url,{'CountyID':CountyId,'ValueChain':ValueChain},function(data){
	 	   
           
            Highcharts.chart('MeberNo', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Registered Members'
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
            name: "Sub County",
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
	  	var CountyId= $("#CountyId").val();
	  	var ValueChain=$("#ValueChain").val();

	  	  var url="<?=url('/System/Dashboard/CountValueQty')?>";
	  	   $.get(url,{'CountyID':CountyId,'ValueChain':ValueChain},function(data){

	  	   	Highcharts.chart('Qualification', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Analysis At Sub County Level'
    },
    subtitle: {
        text: 'Source: <?=config("app.name")?>'
    },
    xAxis: {
        categories: data.categories,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Units',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
   
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: false
            }
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
        name: 'Qty',
        data: data.dataset
    },]
});

	  	   });
	  	 

	  }

</script>
<script type="text/javascript">
	
	var url="<?=url('/System/Dashboard/ValueChains')?>";
	    $.get(url,function(data){

	    	Highcharts.chart('MyValuechains', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'VCO Numbers'
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
            name: "Value Chain",
            colorByPoint: true,
            data: data
        }
    ],
    
});

	    })

	
</script>


@endpush