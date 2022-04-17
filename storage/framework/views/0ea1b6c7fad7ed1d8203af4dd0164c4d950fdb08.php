<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden">
        <thead>         
            <th class="text-center" style="width: 450px;">Income/Expense</th>
            <th class="text-center" style="width: 120px;">Date</th>
            <th class="text-center" style="width: 350px;">Customer/Supplier Name</th>
            <th class="text-center">Amount</th>
        </thead>
        <tbody> 

        <?php 
        
            $keyone = 1;
            $keytwo = 0;
            $keythree = 100;
            $keyfour = 200;
        ?>

        <?php $__currentLoopData = $equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            <tr data-toggle="collapse" data-target="#first<?php echo e($loop->index); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td style="width: 450px;"><i class="fa fa-caret-down"></i><span class="m-2"><?php echo e($item->value); ?></span> </td>
                <td style="width: 120px;"></td>
                <td style="width: 350px;"></td>
                <td></td>                     
            </tr>  
            
            <tr>
                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse" id="first<?php echo e($loop->index); ?>" style="padding: 0; margin: 0; border: hidden"> 

                    <?php $__currentLoopData = $item->children_equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php 
                        $keytwo++; 
                        $net_income = 0;
                        $net_expend = 0;
                    ?>

                        <tr data-toggle="collapse" data-target="#second<?php echo e($keytwo); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="4"><i class="fa fa-caret-down ml-4"></i><span class="m-2"><?php echo e($equip->equipment_id); ?></span> </td>                    
                        </tr> 

                        <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                            <table class="table table-bordered collapse row-child" id="second<?php echo e($keytwo); ?>" style="padding: 0; margin: 0; border: hidden">

                                <tr data-toggle="collapse" data-target="#third<?php echo e($keythree); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 450px;"><i class="fa fa-caret-down ml-5"></i><span class="m-2">Income</span> </td>
                                    <td style="width: 120px;"></td>
                                    <td style="width: 350px;"></td>
                                    <td></td>                     
                                </tr> 
 
                                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="third<?php echo e($keythree); ?>" style="padding: 0; margin: 0; border: hidden">

                                    <?php $__currentLoopData = $equip->child_revenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td style="width: 450px;"><span style="padding-left: 50px;">---</span> </td>
                                            <td style="width: 120px;"><?php echo e(getDateFormat($revenue->to_date)); ?></td>
                                            <td style="width: 350px;"><?php echo e($revenue->customer_name); ?></td>
                                            <td>$<?php echo e($revenue->amount); ?></td>          
                                        </tr>

                                        <?php $net_income += $revenue->amount; ?>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </table>
                                </td>

                                <tr data-toggle="collapse" data-target="#four<?php echo e($keyfour); ?>" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 450px;"><i class="fa fa-caret-down ml-5"></i><span class="m-2">Expense</span> </td>
                                    <td style="width: 120px;"></td>
                                    <td style="width: 350px;"></td>
                                    <td></td>                     
                                </tr>  

                                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="four<?php echo e($keyfour); ?>" style="padding: 0; margin: 0; border: hidden">
                                    
                                    <?php $__currentLoopData = $equip->child_maintenance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="width: 450px;"><span style="padding-left: 50px;">---</span> </td>
                                            <td style="width: 120px;"><?php echo e(getDateFormat($mainten->date)); ?></td>
                                            <td style="width: 350px;"></td>
                                            <td>$
                                                
                                            <?php 
                                            
                                                $expend = $mainten->unit_price *  $mainten->amount;

                                                $net_expend += $expend;
                                            
                                                echo $expend;
                                            ?>

                                            </td>          
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </table>
                                </td> 

                                <tr>

                                    <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                        <table class="table table-bordered row-child" id="demo3" style="padding: 0; margin: 0; border: hidden">

                                            <tr>
                                                <td style="width: 450px;"><span style="padding-left: 25px;">Net Income of <?php echo e($equip->equipment_id); ?></span> </td>
                                                <td style="width: 120px;"></td>
                                                <td style="width: 350px;"></td>
                                                <td >$<?php echo e($net_income -  $net_expend); ?></td>          
                                            </tr>

                                        </table>
                                    </td>

                                </tr>

                                

                            </table>
                        </td>

                        <?php 

                        $keyfour++; 
            
                        $keythree++; 
                    ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>
                </td>
            </tr>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table> 
</div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/report/equipment-report/partials/row-result.blade.php ENDPATH**/ ?>