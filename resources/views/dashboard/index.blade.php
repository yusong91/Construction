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
                    <div class="text-muted"><h4>{{ $equipment_available + $equipment_rental + $equipment_maintenance }}</h4> </div>
                </div>           
            </div> 
        </div>
    </div>

    <div class="col-xl-4 col-md-6"> 
        <div class="card widget" >
            <div class="card-body">
            <div class="text-center">
                        <h3 class="text-center">Total Rent</h3>
                        <div class="text-muted"><h4></h4> </div>
                    </div>
            </div> 
        </div>
    </div>

    <div class="col-xl-4 col-md-6"> 
        <div class="card widget">
            <div class="card-body">
                <div class="text-center">
                        <h3 class="text-center">In Stock</h3>
                        <div class="text-muted"><h4></h4> </div>
                </div>
            </div> 
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <table class="table tbl-info table-light"  >
            <thead style="background-color: #FFFFFF;">
                <th>
                    @lang('Equipment Available')
                </th> 
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center> <div id="barchart_total_gender" ></div></center> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-6">
        <table class="table tbl-info table-light"  >
            <thead style="background-color: #FFFFFF;">
                <tr>
                    <th>
                        @lang('Unclaim and Claim invoice')
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                         <div id="chart_action"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="row">
   
    <div class="col-md-12">
        <table class="table tbl-info table-light" >
            <thead style="background-color: #FFFFFF;">
                <th>
                    @lang('Income and Expense by category of each equipment')
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div id="barchart_material" ></div>
                    </td>   
                </tr>
            </tbody>
        </table> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table tbl-info table-light" >
            <thead style="background-color: #FFFFFF;">
                <tr>
                    <th>
                        @lang('Revenue of rental')
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="vertical-align: middle;">
                        <div id="curve_chart" ></div>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>

@stop

@section('scripts')
   
    <!-- Equipment available -->
    <script>

        var equipment_maintenance = <?php echo $equipment_maintenance;?>;
        var equipment_rental = <?php echo $equipment_rental; ?>;
        var equipment_available = <?php echo $equipment_available; ?>;

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Equipment", "", { role: "style" } ],
                ["Maintenance", equipment_maintenance, "red"],
                ["Rental", equipment_rental, "green"],
                ["Available", equipment_available, "blue"],
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
                legend: { position: 'none'},


                backgroundColor: 'none',
            };
            var chart = new google.visualization.BarChart(document.getElementById("barchart_total_gender"));
            chart.draw(view, options);
        }   
    </script>

    <script>
        //Income and Expense by category of each equipment
        //legend: { position: 'bottom', maxLines: 2, pagingTextStyle: { color: '#374a6f' }, scrollArrows: { activeColor: '#666', inactiveColor: '#ccc' } }
        
        var income_and_expense = <?php echo collect($income_and_expense); ?>;
        var income_and_expense_array = Array.from(income_and_expense);

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable(
                
                income_and_expense_array
            );

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                    width: 0
                },
                bar: {groupWidth: "20%", isStacked:true},
            
                legend: {position: 'left'},
                    bars: 'vertical'
            };
            
            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        // Unclaim and Claim
        var maintenance_claim = <?php echo $claim;?>;
        var maintenance_unclaim = <?php echo $unclaim;?>;
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(pic_chart);
        function pic_chart() {

            var data = google.visualization.arrayToDataTable([
                ['Invoice', 'Claim and Unclaim'],
                ['Claim', maintenance_claim],
                ['Unclaim', maintenance_unclaim]
            ]);

            var options = {
                    title: '',
                    backgroundColor: 'none',
                    legend: 'left',
                    chartArea: {width: 400, height: 300}
                };

            var chart = new google.visualization.PieChart(document.getElementById('chart_action'));

            chart.draw(data, options);
        }


    </script>

    <!-- Revenue of rental -->
    <script type="text/javascript">

        var revenue_by_date = <?php echo collect($revenue_by_date); ?>;
        var revenue = Array.from(revenue_by_date);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(
            
                revenue
            );

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
