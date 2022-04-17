@extends('layouts.main_app')

<style>

    .select2-container .select2-selection--single{
        height:40px !important;
    }
    .select2-container--default .select2-selection--single{
        border: 1px solid #C3CAD2 !important; 
        border-radius: 3px !important; 
        padding: 6px 12px;
    } 

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 30px;
        position: absolute;
        top: 6px !important;
        right: 1px;
        width: 20px
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #D0686C;
        line-height: 48px
    }

</style>

@section('page-title', __('Report Outstanding'))
@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop 

@section('content')
@include('partials.messages') 

<div class="card"> 
    <div class="card-body">

        @include('partials.button_group_report') 

    <fieldset class="border p-2">
    <legend>Report</legend> 

        @include('report.equipmentoutstand-report.partials.input-form') 

        @include('report.equipmentoutstand-report.partials.row')
        
    </fieldset>

    <button type="submit" class="btn btn-primary mt-3">OK</button>
        
    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/login.js') !!}
@stop



