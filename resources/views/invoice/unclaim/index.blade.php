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

            <div class="row ">
                <div class="col-3">
                    <div class="form-floating mb-3">
                        <label for="a_date">@lang('Filter From Date')</label>
                        <input type="text" id="a_date" class="form-control" name="from_date" value=""  >       
                    </div>
                </div> 
    
                <div class="col-3">
                    <div class="form-floating mb-3">
                        <label for="a_date">@lang('To Date')</label>
                        <input type="text" id="b_date" class="form-control" name="to_date" value="" >
                    </div>
                </div>
            </div>

        <form action="{{ route('unclaim.store') }}" method="POST"  accept-charset="UTF-8" autocomplete="off">

            @include('invoice.unclaim.partials.row')  
                    
            @csrf 
            <button type="submit" class="btn btn-primary mt-4">Claim</button>
        </form>

    </div>
</div>

@stop



