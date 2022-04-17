<div class="row">
            
    <div class="col-lg-5 mb-4 mt-0">
                
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    
            <a type="button" id="reportstandard" href="<?php echo e(route('report-standard.index')); ?>" style="width: 160px;" class="btn btn-light" >Report Standard</a>
                    
            <a type="button" id="reportequipment" href="<?php echo e(route('report-equipment.index')); ?>" style="width: 190px;" class="btn btn-light">Report by Equipment</a>
                    
            <a type="button" id="reportmovement" href="<?php echo e(route('report-movement.index')); ?>" style="width: 190px;" class="btn btn-light">Report on Movement</a>

            <a type="button" id="reportequipmentoutstand" href="<?php echo e(route('report-equipmentoutstand.index')); ?>" style="width: 230px;" class="btn btn-light">Equipment Outstanding</a>

        </div>

    </div>
</div>

<script type="text/javascript">

 var active = <?php echo $active; ?>;

    switch (active.id) {
 
        case 'reportstandard': 
        
            $('#reportstandard').addClass('active');

            break;

        case 'reportequipment': 
        
            $('#reportequipment').addClass('active');
            break;

        case 'reportmovement': 
            
            $('#reportmovement').addClass('active');
            break;

        case 'reportequipmentoutstand': 
        
            $('#reportequipmentoutstand').addClass('active');
            break;

        default: '';
            break;
    }

    
</script><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/partials/button_group_report.blade.php ENDPATH**/ ?>