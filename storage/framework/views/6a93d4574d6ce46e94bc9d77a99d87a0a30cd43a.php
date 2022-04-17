<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden">
        <thead> 
            <th class="text-center" style="width: 400px;">Customer</th>
            <th class="text-center" style="width: 250px;">From Location</th>
            <th class="text-center" style="width: 250px;">To Location</th>
            <th class="text-center" style="width: 120px;">From Date</th>
            <th class="text-center" style="width: 120px;">To Date</th>   
        </thead>
        <tbody>  

        <?php 
            $first = 100;
            $second = 1;
            $third = 10;
        ?>

        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php 
                $first++;
            ?>

            <tr data-toggle="collapse" data-target="#first<?php echo e($first); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td colspan="5"><i class="fa fa-caret-down"></i><span class="m-2"><?php echo e($item->value); ?></span> </td>                 
            </tr>  
            
            <tr>
                <td colspan="5" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse" id="first<?php echo e($first); ?>" style="padding: 0; margin: 0; border: hidden"> 

                    <?php $__currentLoopData = $item->children_equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <tr data-toggle="collapse" data-target="#second<?php echo e($second); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="5"><i class="fa fa-caret-down ml-4"></i><span class="m-2"><?php echo e($equipment->equipment_id); ?></span> </td>                    
                        </tr> 

                        <td colspan="5" class="hiddenRow" style="padding: 0; margin: 0;">
                            <table class="table table-bordered collapse row-child" id="second<?php echo e($second); ?>" style="padding: 0; margin: 0; border: hidden">

                            <?php $__currentLoopData = $equipment->child_movement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-toggle="collapse" data-target="#third<?php echo e($third); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 400px;"><i class="fa fa-caret-down ml-5"></i><span class="m-2"><?php echo e($move->customer_name); ?></span> </td>
                                    <td style="width: 250px;"><?php echo e($move->from_location); ?></td>
                                    <td style="width: 250px;"><?php echo e($move->to_location); ?></td>
                                    <td style="width: 120px;"><?php echo e($move->date); ?></td>
                                    <td style="width: 120px;">---</td>                     
                                </tr> 

                                <td colspan="5" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="third<?php echo e($third); ?>" style="padding: 0; margin: 0; border: hidden">

                                        <tr>
                                            <td style="width: 400px;"><span style="padding-left: 50px;"> song 1 </span> </td>
                                            <td style="width: 250px;">02/03/2022</td>
                                            <td style="width: 250px;"></td>
                                            <td style="width: 120px;"></td>
                                            <td style="width: 120px;"></td>         
                                        </tr>

                                    </table> 
                                </td> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </table>
                        </td>

                        <?php 
                        $second++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </table>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </tbody>
    </table> 
</div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/report/movement-report/partials/row-result.blade.php ENDPATH**/ ?>