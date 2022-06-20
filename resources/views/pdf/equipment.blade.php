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

                <h4 style="text-align: center; font-size: 14px;">List Equipment</h4>
                         
                <div>
                    <table id="customers">
                        <thead style="font-size: 12px; font-weight: bold;">      
                            <tr>
                                <th style="text-align: center; width: 5%;">#</th>
                                <th style="text-align:center; width: 20%;">Equipment Type</th>
                                <th style="text-align:center; width: 20%;">Equipment Id</th>
                                <th style="text-align:center; width: 20%;">Brand</th>
                                <th style="text-align:center; width: 20%;">Purchased Date</th>
                                <th style="text-align:center; width: 10%;">Year</th>
                            </tr>      
                        </thead>
                        <tbody>
                            @if(count($equipments) > 0)
                                @foreach($equipments as $item)
                                    <tr>  
                                        <td style ="text-align: center;">{{ 1 + $loop->index }}</td>
                                        <td>{{ $item->parent_quipment->value ?? ""}}</td>
                                        <td>{{ $item->equipment_id ?? "" }}</td>
                                        <td>{{ $item->parent_brand->value ?? "" }}</td>
                                        <td>{{ $item->purchase_date ? getDateFormat($item->purchase_date) : "" }}</td>
                                        <td>{{ $item->year ?? ""}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><em>@lang('Record no found')</em></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

