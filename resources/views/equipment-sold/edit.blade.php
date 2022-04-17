@extends('layouts.main_app')

@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard'))

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
 
  tr td{
        padding: 0 !important;
        margin: 0 !important;
  }
  .form-control, .custom-file-label {
        border: 0;
  }

  .select2-container .select2-selection--single{
        height:40px !important;
        width: 100%;
    }
    
    .select2-container--default .select2-selection--single{
        border: 0 solid #C3CAD2 !important; 
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

        @include('partials.button_group_transaction') 

        <form action="{{ route('equipmentsold.update', $edit->id) }}" method="POST"  accept-charset="UTF-8" autocomplete="off">
            @method('PUT')
            @include('equipment-sold.partials.row-edit')
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
</div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


var equipment_id = '<?php echo $edit->equipment_id; ?>';

var equip_type_id = '<?php echo $edit->type_id; ?>';

var test =  equip_type_id + " " + equipment_id;

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }).val(test).trigger('change');


</script>

@stop

