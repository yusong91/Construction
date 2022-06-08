@extends('layouts.app')

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
</style>

<div class="card">
    <div class="card-body">
       
        <div class="row ">
            <div class="col-5">
                        
                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                    <div class="input-group custom-search-form">
                        <input  type="text" class="form-control input-solid" name="search" value="{{ Request::get('search') }}" placeholder="Search"/>

                            <span class="input-group-append">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('customer.index') }}"  class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i> </a>
                                @endif
                                    <button class="btn btn-light" type="submit" id="search-activities-btn"><i class="fas fa-search text-muted"></i></button>
                            </span>
                    </div>

                {{ csrf_field() }}
                </form>
            </div> 
    
            <div class="col-7"> 
                <div class="float-right">
                    <div class="row">
                        
                        <div class="col-xl-5 col-md-5">
                            <a href="{{ route('staff.create') }}" class="btn btn-primary" style="width: 100px;" ><i class="fas fa-plus mr-2"></i>Staff</a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>

        @include('staff.partials.row')
        
    </div>
</div>

@stop

