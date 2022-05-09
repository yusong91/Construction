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
        <fieldset class="border p-2" >
            <legend>New Maintenance</legend>
            <form action="{{ route('maintenance.store') }}" id="user-form" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">
                
                <div class="row">
                    
                    <div class="col-4">
                        <label for="invoice">@lang('Maintenance Date')</label>   
                        <input class="form-control" type="text" id="a_date">        
                    </div> 

                    <div class="col-4"></div>

                    <div class="col-4">
                        <label for="invoice">@lang('Invoice Number/Other Attachment')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_replacement" name="invoice" style="width: 350px;">
                            <label class="custom-file-label" for="file_replacement"></label>
                        </div>   
                    </div> 

                </div> 
                @include('maintenance-sparepart.partials.row-input')
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </fieldset>
    </div>
</div>

<script>

    for(var i = 1; i <= 8; i++)
    {
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

