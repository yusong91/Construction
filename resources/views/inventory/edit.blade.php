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
    .cell-1 {
    border-collapse: separate;
    background: #ffffff;
    }
    thead {
        background: #dddcdc
    }
    .table-elipse {
        cursor: pointer
    }
    .row-child {
        background-color: #EFF2F4; 
        color: #0B0B0B
    }

    tr td{
        padding: 0 !important;
        margin: 0 !important;
    }
    .form-control, .custom-file-label {
        border: 0;
    }
    .form-control{border-radius:0px !important;}

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

        @include('partials.button_group') 
        <form action="{{ route('inventory.update', $edit->id) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">
           @method('PUT') 
            @include('inventory.partials.edit-form') 
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mt-4">Update</button>  
        </form>
    </div>
</div>

<script>
      
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
   
    var warehouse_id = <?php echo $edit->warehouse_id; ?>

    $('.warehouse').select2({
        placeholder: '',
        allowClear: true
    }).val(warehouse_id).trigger('change');

    var sub_category = $("#category_id option:selected" ).attr("sub_category");

    var sub_categorys = sub_category == '' ? [] : sub_category.split(',');
    
    for (let index = 0; index < sub_categorys.length; index++) {

        $("#name").append($('<option>', { value: sub_categorys[index], text: sub_categorys[index] }));
    }

    var name = "<?php echo $edit->name; ?>";

    $('.select-subcategory').select2({
        placeholder: 'Select Category',
        allowClear: true
    }).val(name).trigger('change');


    $("#category_id").change(function () {

        console.log('----');
        var element = $('#category_id' + ' option:selected');
        var sub_category = element.attr("sub_category") ?? '';
        var sub_categorys = sub_category == '' ? [] : sub_category.split(',');

        if(sub_categorys.length > 0){

            for (let index = 0; index < sub_categorys.length; index++) {

                $("#name").append($('<option>', { value: sub_categorys[index], text: sub_categorys[index] }));
            }
        } else {

            $("#name").find('option').remove().end();
        }


       


    });
    
</script>

@stop

