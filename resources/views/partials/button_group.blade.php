<div class="row">
            
    <div class="col-lg-5 mb-4 mt-0">
                
        <div class="btn-group" role="group" >
                    
            <a type="button" id="equipment" href="{{ route('equipment.index') }}" style="width: 150px;" class="btn btn-light" >Equipment List</a>
                    
            <a type="button" id="sparepart" href="{{ route('sparepart.index') }}" style="width: 140px;" class="btn btn-light">Spare Part List</a>
                    
            <a type="button" id="inventory" href="{{ route('inventory.index') }}" style="width: 135px;" class="btn btn-light">Inventory List</a>

            <a type="button" id="supplier" href="{{ route('supplier.index') }}" style="width: 135px;" class="btn btn-light">Supplier List</a>

            <a type="button" id="customer" href="{{ route('customer.index') }}" style="width: 135px;" class="btn btn-light">Customer List</a>

        </div>

    </div>
</div> 
 
<script type="text/javascript">

 var active = <?php echo $active; ?>;

    switch (active.id) {

        case 'equipment': 
        
            $('#equipment').addClass('active');

            break;

        case 'sparepart': 
        
            $('#sparepart').addClass('active');
            break;

        case 'inventory': 
            
            $('#inventory').addClass('active');
            break;

        case 'supplier': 
        
            $('#supplier').addClass('active');
            break;

        case 'customer': 
        
            $('#customer').addClass('active');
            break;
    
        default: '';
            break;
    }

    
</script>