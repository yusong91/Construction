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
                padding: 8px;
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

                <h4 style="text-align: center; font-size: 14px;">Report Standard</h4>
                         
                <div>
                    <table id="customers">
                        
                        <tbody>
                            @if(count($reports) > 0)
                                @foreach($reports as $item)

                                <tr>
                                    <th style="text-align:center; width: 20%;">Income</th>
                                    <th style="text-align:center; width: 15%;">Date</th>
                                    <th style="text-align:center; width: 20%;">Customer</th>
                                    <th style="text-align:center; width: 10%;">Amount</th>
                                </tr> 

                                    <tr>  
                                        <td colspan="4" style ="text-align: center;">2022-06-01</td>
                                    </tr>

                                    <tr>  
                                        <td style ="text-align: center;">DX01</td>
                                        <td style ="text-align: center;">01/06/2022</td>
                                        <td style ="text-align: center;">Company A</td>
                                        <td style ="text-align: center;">$1000</td>
                                    </tr>

                                    <tr>  
                                        <td style ="text-align: center;">DX02</td>
                                        <td style ="text-align: center;">01/06/2022</td>
                                        <td style ="text-align: center;">Company A</td>
                                        <td style ="text-align: center;">$1000</td>
                                    </tr>


                                <tr>
                                    <th style="text-align:center; width: 20%; background-color: #FC6D44">Expend</th>
                                    <th style="text-align:center; width: 15%; background-color: #FC6D44">Date</th>
                                    <th style="text-align:center; width: 20%; background-color: #FC6D44">Customer</th>
                                    <th style="text-align:center; width: 10%; background-color: #FC6D44">Amount</th>
                                </tr> 

                                    <tr>  
                                        <td colspan="4" style ="text-align: center;">2022-06-01</td>
                                    </tr>

                                    <tr>  
                                        <td style ="text-align: center;">DX01</td>
                                        <td style ="text-align: center;">01/06/2022</td>
                                        <td style ="text-align: center;">Company A</td>
                                        <td style ="text-align: center;">$1000</td>
                                    </tr>

                                    <tr>  
                                        <td style ="text-align: center;">DX02</td>
                                        <td style ="text-align: center;">01/06/2022</td>
                                        <td style ="text-align: center;">Company A</td>
                                        <td style ="text-align: center;">$1000</td>
                                    </tr>


                                    <tr>  
                                        <td class="p-4" colspan="2" style ="text-align: center; background-color: #7ACAE8;">Net Income</td>
                                        <td colspan="2" style ="text-align: center; background-color: #7ACAE8;">$1000</td>
                                    </tr>



                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><em>@lang('Record no found')</em></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

