<div class="row">
            
    <div class="col-lg-5 mb-4 mt-0">
                
        <div class="btn-group" role="group" >
                    
            <a type="button" id="equipment" href="<?php echo e(route('equipment.index')); ?>" style="width: 150px;" class="btn btn-light" >Equipment List</a>
                    
            <a type="button" id="sparepart" href="<?php echo e(route('sparepart.index')); ?>" style="width: 140px;" class="btn btn-light">Spare Part List</a>
                    
            <a type="button" id="inventory" href="<?php echo e(route('inventory.index')); ?>" style="width: 135px;" class="btn btn-light">Inventory List</a>

            <a type="button" id="supplier" href="<?php echo e(route('supplier.index')); ?>" style="width: 135px;" class="btn btn-light">Supplier List</a>

            <a type="button" id="customer" href="<?php echo e(route('customer.index')); ?>" style="width: 135px;" class="btn btn-light">Customer List</a>

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

    
</script><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/partials/button_group.blade.php ENDPATH**/ ?>