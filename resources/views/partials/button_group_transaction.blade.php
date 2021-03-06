<div class="row">
            
    <div class="col-lg-5 mb-4 mt-0">
                
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    
            <a type="button" id="equipmentsold" href="{{ route('equipmentsold.index') }}" style="width: 150px;" class="btn btn-light" >Equipment Sold</a>
                    
            <a type="button" id="movement" href="{{ route('movement.index') }}" style="width: 160px;" class="btn btn-light">Movement & Rent</a>
                    
            <a type="button" id="revenue" href="{{ route('revenue.index') }}" style="width: 115px;" class="btn btn-light">Revenue</a>

            <a type="button" id="maintenance" href="{{ route('maintenance.index') }}" style="width: 230px;" class="btn btn-light">Maintenance & Spare-Part</a>

        </div>

    </div>
</div>

<script type="text/javascript">

 var active = <?php echo $active; ?>;

    switch (active.id) {

        case 'transaction', 'equipmentsold': 
        
            $('#equipmentsold').addClass('active');

            break;

        case 'movement': 
        
            $('#movement').addClass('active');
            break;

        case 'revenue': 
            
            $('#revenue').addClass('active');
            break;

        case 'maintenance': 
        
            $('#maintenance').addClass('active');
            break;

        default: '';
            break;
    }

    
</script>