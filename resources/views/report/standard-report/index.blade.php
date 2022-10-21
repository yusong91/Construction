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

@section('page-title', __('Report Standard'))
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

        <form action="{{ route('report-standard.store') }}" id="user-form" method="POST" accept-charset="UTF-8">

            <fieldset class="border p-2">
            <legend>Report</legend> 

                @include('report.standard-report.partials.input-form') 

                @include('report.standard-report.partials.row')
                
            </fieldset>
            @csrf
            <button type="submit" class="btn btn-primary mt-4">OK</button>
        </form>
    </div>
</div>

@stop



