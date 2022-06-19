<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php   
            ini_set('memory_limit', '64M');
            ini_set("pcre.backtrack_limit", "90000000");
        ?>

        <style type="text/css">
                
            body { font-family: 'khmerfont';   font-size: 11px !important;}


            #customers {
                font-family: "khmerfont", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                table-layout: auto;
                width: 100%;
                font-size: 11px;
            }

            #customers td, #customers th {
                
                border: 1px solid #ddd;
                padding: 2px;
            } 

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {

                background-color: #ddd;
                page-break-inside: avoid;
            }

            #customers th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #15A23D;
                color: white;
            }

            h5{
                display: inline-block;
                vertical-align: middle;
                line-height: 1px;
            }

            #customers {
            border: 1px solid black;
            table-layout: fixed;
            
            }

        </style>     
    </head>
    <body> 
        <div class="card">
            <div class="card-body">

                <h4 style="text-align: center; font-size: 14px;">List Equipment Outstanding</h4>
                         
                <div>
                    <table id="customers">
                        <thead style="font-size: 12px; font-weight: bold;">        
                            <tr>
                                <th style="text-align: center; width: 5%;">#</th> 
                                <th style="text-align:center; width: 18%;">Equipment Type</th>
                                <th style="text-align:center; width: 14%;">Equipment ID</th>
                                <th style="text-align:center; width: 15%;">Brand</th>
                                <th style="text-align:center; width: 12%;">Status</th>
                                <th style="text-align:center; width: 18%;">Historical Cost</th>
                                <th style="text-align:center; width: 18%;">Purchased Date</th>
                            </tr>       
                        </thead>
                        <tbody>
                            @if(count($equipments) > 0)
                                @foreach($equipments as $item)
                                    <tr>   
                                        <td style ="text-align: center;">{{ 1 + $loop->index }}</td>
                                        <td>{{ $item->parent_quipment->value }}</td>
                                        <td>{{ $item->equipment_id }}</td>
                                        <td>{{ $item->parent_brand->value }}</td>
                                        <td></td>
                                        <td>${{ $item->historical_cost }}</td>
                                        <td>{{ getDateFormat($item->purchase_date) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><em>@lang('Record no found')</em></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

