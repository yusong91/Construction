@extends('layouts.main_app')



@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop

@section('content')
    @include('partials.messages') 
 
<div class="row">
    
    <div class="col-xl-4 col-md-6"> 
        <div class="card widget">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="text-center">Total Equipment</h3>
                    <div class="text-muted"><h4>4</h4> </div>
                </div>           
            </div> 
        </div>
    </div>

    <div class="col-xl-4 col-md-6"> 
        <div class="card widget" >
            <div class="card-body">
            <div class="text-center">
                        <h3 class="text-center">Total Rent</h3>
                        <div class="text-muted"><h4>1</h4> </div>
                    </div>
            </div> 
        </div>
    </div>

    <div class="col-xl-4 col-md-6"> 
        <div class="card widget">
            <div class="card-body">
                <div class="text-center">
                        <h3 class="text-center">In Stock</h3>
                        <div class="text-muted"><h4>3</h4> </div>
                </div>
            </div> 
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <table class="table tbl-info table-light"  style="height: 300px;">
            <thead>
                
                <th>
                    @lang('Data_patient_4_day_later')
                </th>
                
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div id="barchart_material" style="width: auto"></div>
                    </td>   
                </tr>
            </tbody>
        </table> 
    </div>

    <div class="col-md-6">
        <table class="table tbl-info table-light"  style="height: 300px;">
            <thead>
                <tr>
                    <th>
                            dfd
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center> <div id="chart_action"></div></center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <table class="table tbl-info table-light"  >
            <thead>
                <th>
                    ---
                </th> 
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div id="barchart_total_gender" style="width: auto;"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table tbl-info table-light"  style="height: 400px;">
            <thead>
                <tr>
                    <th>
                        @lang('total_line_chart')
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="vertical-align: middle;">
                        <div id="curve_chart" style="width: auto"></div>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>

@stop

@section('scripts')
   

<script>

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
            chart: {
            title: '',
            subtitle: ''
        },
        legend: {position: 'none'},
            bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(test);
    function test() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ]);

        var options = {
                title: '',
                backgroundColor: 'none',
                legend: 'none',
                chartArea: {width: 400, height: 300}
            };

        var chart = new google.visualization.PieChart(document.getElementById('chart_action'));

        chart.draw(data, options);
    }
    

</script>

<script>

    var total_female = 5;
    var total_male = 3;

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "", { role: "style" } ],
        ["Female", total_female, "red"],
        ["Male", total_male, "blue"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        width: 550,
        height: 200,
        
        bar: {groupWidth: "50%"},
        legend: { position: 'none' },
        backgroundColor: 'none',

      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_total_gender"));
      chart.draw(view, options);
  }
    
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Testing', 'Testing'],
          ['2004',  1000,      400],
          ['2005',  110070,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540],
          ['2007',  1030,      540]
        ]);

        var options = {
            title: '',
            curveType: 'function',
            legend: { position: 'bottom' },
            backgroundColor: 'none',
            width: "100%",
            height: 400,
            chartArea:{
                left:100,
                right:50,
                bottom:40,
                top:20,
                width:"100%",
                height:"100%"
            }
                        
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
</script>

@stop
