@extends('layouts.main_app')

<style>

    .rounded {
        border-radius:.50rem!important
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    input[type="number"] {
        min-width: 50px;
    }
    
    .tbl-info {
        border-bottom-left-radius: .5rem;
        border-bottom-right-radius: .5rem;
    }
    .tbl-info thead th:first-child {
        border-top-left-radius: .5rem;
        color: #fff;
    }
    .tbl-info thead th:last-child {
        border-top-right-radius: .5rem;
        /* color: #fff; */
    }
   
    .tbl-info tbody td:first-child {
        border-bottom-left-radius: .5rem;
    }
   
    .tbl-info tbody td:last-child {
        border-bottom-right-radius: .5rem;
    }

    .tbl-info td {
        vertical-align: top !important;
    }
    
    .user-list li {
        margin-bottom: .5rem;
    }
    
    .user-list li::before {
        content: "-";
        /* display: inline-block; */
        margin-right: 10px;
    }

    th{
        color: white;
        background: #31BDE4;
    }
        
</style>

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
        <table class="table tbl-info table-light shadow rounded"  style="height: 300px;">
            <thead class="bg-primary">
                
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
        <table class="table tbl-info table-light shadow"  style="height: 300px;">
            <thead class="bg-primary">
                <tr>
                    <th>
                    @lang('Data_patient_dialy')
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
        
        <div id="barchart_total_gender" style="width: auto;"></div>
                        
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h5 class="card-title"></h5>
                <div class="pt-4 px-3">
                <canvas id="myChart" height="365"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    @foreach (\Vanguard\Plugins\Vanguard::availableWidgets(auth()->user()) as $widget)
        @if (method_exists($widget, 'scripts'))
            {!! app()->call([$widget, 'scripts']) !!}
        @endif
    @endforeach

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

@stop
