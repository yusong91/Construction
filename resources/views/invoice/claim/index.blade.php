@extends('layouts.main_app')

@section('page-title', __('Unclaim'))
@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop 
 
@section('content')
@include('partials.messages') 

<div class="card">
    <div class="card-body">

        @include('partials.button_claim') 
           
        @include('invoice.claim.partials.row') 
                  
    </div>
</div>

@stop



