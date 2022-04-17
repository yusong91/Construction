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

    legend.scheduler-border {
        width:auto; /* Or auto */
        padding:0 10px; /* To give a bit of padding on the left and right */
        border-bottom:none; 
    }

    tr td{
        padding: 0 !important;
        margin: 0 !important;
    }
    .form-control, .custom-file-label {
        border: 0;
    }
   
</style>

<div class="card">
    <div class="card-body">
        @include('partials.button_group')
        <div class="row ">
            <div class="col-12">
            <form action="{{ route('supplier.store') }}" method="POST"  accept-charset="UTF-8" autocomplete="off">
                @include('supplier.partials.input-form')
                @csrf
                <button type="submit" class="btn btn-primary mt-4">Create</button>
            </form>
        </row>
    </div>
</div>

@stop

