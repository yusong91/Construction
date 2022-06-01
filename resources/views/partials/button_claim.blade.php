<div class="row">
            
    <div class="col-lg-5 mb-4 mt-0">
                
        <div class="btn-group" role="group" >
            <a type="button" id="unclaim" href="{{ route('unclaim.index') }}" style="width: 200px;" class="btn btn-light" >Unclaimed Invoice</a>
            <a type="button" id="claim" href="{{ route('claim.index') }}" style="width: 200px;" class="btn btn-light" >Claimed Invoice</a>
        </div>

    </div>
</div> 
 
<script type="text/javascript">

 var active = <?php echo $active; ?>;

    switch (active.id) {

        case 'unclaim': 
            $('#unclaim').addClass('active');
            break;

        case 'claim': 
            $('#claim').addClass('active');
            break;

        default: '';
            break;
    }

    
</script>