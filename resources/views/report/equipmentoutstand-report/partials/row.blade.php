<div class="table-responsive" style="padding-top: 10px;">
    <table class="table table-bordered table-striped">
        <thead> 
            <th class="text-center align-middle">Equipment Type</th>
            <th class="text-center">Equipment ID</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Status</th>
            <th class="text-center">Historical Cost</th>
            <th class="text-center">Purchased Date</th>            
        </thead>
        <tbody> 

        @foreach($equipments as $item)
            <tr >
                <td class="text-center align-middle">{{ $item->parent_quipment->value }}</td>
                <td class="text-center align-middle">{{ $item->equipment_id }}</td>
                <td class="text-center align-middle">{{ $item->parent_brand->value }}</td>
                <td class="text-center align-middle">{{ $item->status }}</td>
                <td class="text-center align-middle">${{ $item->historical_cost }}</td>
                <td class="text-center align-middle">{{ getDateFormat($item->purchase_date) }}</td>                
            </tr>
        @endforeach 
        </tbody>
    </table> 
</div>