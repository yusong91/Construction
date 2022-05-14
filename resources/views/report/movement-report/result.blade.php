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

@section('page-title', __('Report Movement'))
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

    <form action="{{ route('report-movement.store') }}" id="user-form" method="POST" accept-charset="UTF-8">

        <fieldset class="border p-2">
        <legend>Report</legend> 
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        <a href="" class="mr-2"><img src="{{ url('assets/img/pdf.png') }}" width="25"></a>   
                    </div>      
                </div>
            </div>
            @include('report.movement-report.partials.input-form') 
            @include('report.movement-report.partials.row-result')
        </fieldset>
        @csrf
        <button type="submit" class="btn btn-primary mt-4">OK</button>

    </form>
        
    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/login.js') !!}
@stop



