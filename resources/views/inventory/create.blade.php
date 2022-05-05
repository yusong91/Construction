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
        <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">
            
            @include('inventory.partials.input-form') 
            @csrf
            <button type="submit" class="btn btn-primary mt-4">Create</button>  
        </form>
    </div>
</div>
 
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

@stop

