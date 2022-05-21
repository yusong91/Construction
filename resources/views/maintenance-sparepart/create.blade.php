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

    tr td{
            padding: 0 !important;
            margin: 0 !important;
    }

    .form-borderless {
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

    .fixed
    {
        position:fixed;
        width: 50%;
        
       
    }
    
</style>

<div class="card">
    <div class="card-body">
        @include('partials.button_group_transaction')
        
            <form action="{{ route('maintenance.store') }}" id="user-form" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">
                
            <fieldset class="border pl-2 pr-2" > 
            <legend>New Maintenance</legend>

                @include('maintenance-sparepart.partials.row-input')
                
            </fieldset>
            @csrf
                <button type="submit" class="btn btn-primary mt-2">Create</button>
            </form>
         
    </div>
</div>

<script> 

    for(var i = 1; i <= 8; i++)
    {
        $("#"+ i +"invoice_file").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $("#file_broken" + i).on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $("#file_replacement" + i).on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    }
    
</script>

@stop

