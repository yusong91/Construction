  
<div class="row ">
            
    <div class="col-4">
        <div class="form-floating mb-3">
            <input type="text" id="a_date" class="form-control" name="from_date" placeholder="From Date" required>       
        </div>
    </div>
  
    <div class="col-4">
        <div class="form-floating mb-3">
            <input type="text" id="b_date" class="form-control" name="to_date" placeholder="To" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-floating mb-3">
            <select class="form-control js-example-responsive" name="sort_by" data-live-search="true" id="select_box" required>
                            
                <option value="asc">A-Z</option>
                <option value="desc">Z-A</option>
                
            </select> 
        </div>
    </div>

</div>

<script>
    
    $('.js-example-responsive').select2({
        placeholder: 'Select Sory By',
        allowClear: true
    }).val(null).trigger('change');
    $( document ).tooltip();

</script>

        
