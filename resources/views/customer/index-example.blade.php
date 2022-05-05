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
</style>

<div class="card">
    <div class="card-body">
        @include('partials.button_group')
        <div class="row ">
            <div class="col-4">
                        
                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                    <div class="input-group custom-search-form">
                        <input  type="text" class="form-control input-solid" name="search" value="{{ Request::get('search') }}" placeholder="Search"/>

                            <span class="input-group-append">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('customer.index') }}" class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i></a>
                                @endif
                                    <button class="btn btn-light" type="submit" id="search-activities-btn"> <i class="fas fa-search text-muted"></i> </button>
                            </span>
                    </div>

                    {{ csrf_field() }}
                </form>
            </div> 
    
            <div class="col-8"> 
                <div class="float-right">
                    <div class="row">
                        <div class="col-xl-1 col-md-1 pr-4">
                            <a href="" class="vertical-center" ><img src="{{ url('assets/img/pdf.png') }}" width="25"></a>
                        </div>
                        <div class="col-xl-1 col-md-1 pr-4">
                            <a href="" class="vertical-center"  ><img src="{{ url('assets/img/excel.png') }}" width="25" ></a>
                        </div>
                        <div class="col-xl-5 col-md-5">
                            <a href="{{ route('customer.create') }}" class="btn btn-primary" style="width: 156px;" >+ New Company</a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">Company Name</th>
                    <th class="text-center verticel-center">Customer Name</th>
                    <th class="text-center verticel-center">Rental Service</th>
                    <th class="text-center verticel-center">Payment</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody>  

                    @if(count($customers))
                        @foreach($customers as $items) 
                            <tr>
                                <th class="text-center verticel-center"><h5>{{ $items->company_name }}</h5></th>
                                <td class="text-center verticel-center" >{{ count($items->child_revenue) < 1 ? $items->customer_name : '' }}</td>
                                <th scope="row" colspan="2"></th>
                                <td class="text-center verticel-center text-center">
                                    <a href="{{ route('customer.show', $items->id) }}" class="btn btn-icon edit" title="List Customer" data-toggle="tooltip" data-placement="top"> <i class="fas fa-list"></i></a>
                                    <a href="{{ route('customer.edit', $items->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('customer.destroy', $items->id) }}" class="btn btn-icon" data-action="" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @foreach($items->child_revenue as $item)
                                <tr>
                                    <td></td>
                                    <td class="text-center verticel-center">{{ $item->customer_name }}</td>
                                    <td class="text-center verticel-center">{{ $item->parent_equipment->revenue_parent_quipment->value }} : {{ $item->parent_equipment->equipment_id }}</td>
                                    <td class="text-center verticel-center">${{ $item->amount ?? '' }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table> 
        </div>
    </div>
</div>

@stop

