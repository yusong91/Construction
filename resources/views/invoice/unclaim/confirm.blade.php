@extends('layouts.main_app')

@section('page-title', __('Confirm'))
@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop 
 
@section('content')
@include('partials.messages') 

<style>

    .vertical-center {
    margin-right: 15px;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%); 
    transform: translateY(-50%);
    }
    
    .select2-container .select2-selection--single{
        height:40px !important;
        width: 100%;
            
    }

    .select2-container--default .select2-selection--single{
        border: 1  #E7F1FF !important; 
        border-radius: 3 !important; 
        padding: 6px 6px;
        width: 100%;
    }  

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 30px;
        width: 100%;
        position: absolute;
        top: 6px !important;
        right: 1px;
        width: 20px
    }  
    
</style> 

<div class="card">
    <div class="card-body"> 

        @include('partials.button_claim') 

        <form action="{{ route('unclaim.create') }}" method="PATCH"  accept-charset="UTF-8" autocomplete="off">
           
            @include('invoice.unclaim.partials.row-confirm') 

            <div class="row mt-5">
                    
                <div class="col-3">
                    <label for="a_date">@lang('Claim To')</label>
                    <select class="form-control js-example-responsive" required name="staff_id" data-live-search="true">
                        @foreach($staffs as $item)   
                            <option value="{{ $item->id }}">{{$item->name}}</option>   
                        @endforeach
                    </select>
                
                </div> 
        
                <div class="col-3">
                    <label for="a_date">@lang('Total Price')($)</label>
                    <input type="number" class="form-control" name="price" required >
                </div>

            </div>
            @csrf
            <button type="submit" class="btn btn-primary mt-4">CONFIRM</button>
        </form>
                  
    </div>
</div>

<script>

    var staff_id = <?php echo $staff_id; ?>

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }).val(staff_id).trigger('change');;

</script>

@stop



