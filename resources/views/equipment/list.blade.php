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

<div class="card">
    <div class="card-body">

        @include('partials.button_group')
        <div class="row">
            <div class="col-4">
                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                    <div class="input-group custom-search-form">
                        <input  type="text" class="form-control input-solid" name="search" value="{{ Request::get('search') }}" placeholder="Search"/>

                        <span class="input-group-append">
                            @if (Request::has('search') && Request::get('search') != '')
                                <a href="{{ route('equipment.show', $id) }}" class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i> </a>
                            @endif
                            <button class="btn btn-light" type="submit" id="search-activities-btn"> <i class="fas fa-search text-muted"></i></button>
                        </span>

                    </div>
                    {{ csrf_field() }}
                </form>
            </div>              
        </div>

        @include('equipment.partials.row-list')

    </div>
</div>

@stop

