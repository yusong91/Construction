<div class="row">
            
    <div class="col-2">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('From Date')</label>
            <input type="text" id="a_date" class="form-control" name="from_date" value="{{ isset($data['from_date']) ? $data['from_date'] : '' }}" required >       
        </div>
    </div> 
  
    <div class="col-2">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('To Date')</label>
            <input type="text" id="b_date" class="form-control" name="to_date" value="{{ isset($data['to_date']) ? $data['to_date'] : '' }}" required >
        </div>
    </div>

</div>


