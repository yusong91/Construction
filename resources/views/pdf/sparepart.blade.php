<!doctype html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    




        <?php   
            ini_set('memory_limit', '64M');
            ini_set("pcre.backtrack_limit", "2000");
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

                <h4 style="text-align: center; font-size: 14px;">List Spare-Part</h4>
                         
                <div>
                    <table id="customers">
                        <thead style="font-size: 12px; font-weight: bold;">         
                            <tr>
                                <th style="text-align: center; width: 5%;">#</th>
                                <th style="text-align:center; width: 20%;">Name</th>
                                <th style="text-align:center; width: 15%;">Quantity</th>
                                <th style="text-align:center; width: 20%;">Unit</th>
                                <th style="text-align:center; width: 10%;">Unit Price</th>
                                <th style="text-align:center; width: 10%;">Amount</th>
                            </tr>         
                        </thead>
                        <tbody>
                            @if(count($spareparts) > 0)
                                @foreach($spareparts as $item)
                                    <tr>  
                                        <td style ="text-align: center;">{{ 1 + $loop->index }}</td>
                                        <td>{{ $item->name ?? ""}}</td>
                                        <td>{{ $item->quantity ?? "" }}</td>
                                        <td>{{ $item->unit ?? "" }}</td>
                                        <td>${{ $item->unit_price ?? "" }}</td>
                                        <td>${{ $item->amount ?? ""}}</td>
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

