  
<div class="row ">
            
    <div class="col-4">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('From Date')</label>
            <input type="text" id="a_date" class="form-control" name="from_date" value="{{ isset($data['from_date']) ? $data['from_date'] : '' }}" required>       
        </div>
    </div>
  
    <div class="col-4">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('To Date')</label>
            <input type="text" id="b_date" class="form-control" name="to_date" value="{{ isset($data['to_date']) ? $data['to_date'] : '' }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('Sort By')</label>
            <select class="form-control js-example-responsive" name="sort_by" data-live-search="true" id="select_box" required>
                @foreach($key_sort as $key => $value)       
                    <option value="{{$key}}">{{ $value }}</option>
                @endforeach
            </select> 
        </div>
    </div>
 
</div>

<script>

    var sory_key = ($data['sort_by'] ? $data['sort_by'] : '');
    
    $('.js-example-responsive').select2({
        placeholder: 'Sory By',
        allowClear: true
    }).val(sory_key).trigger('change');
    $( document ).tooltip();

</script>

        
