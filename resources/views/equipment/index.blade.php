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
                                <a href="{{ route('equipment.index') }}"  class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i></a>
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

                        <div class="col-xl-12 pr-4"> 
                            <a href="" class="mr-2"><img src="{{ url('assets/img/pdf.png') }}" width="25"></a> 
                        
                            <a href="" class="mr-2"><img src="{{ url('assets/img/excel.png') }}" width="25" ></a>
                        
                            <a href="{{ route('equipment.create') }}" class="btn btn-primary" style="width: 145px;" ><i class="fas fa-plus"></i> Equipment</a>
                        </div>

                    </div>
                </div>                  
            </div>
        </div>

        <div class="table-responsive" style="margin-top: 40px;">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="text-center align-middle">Equipment Type</th>
                    <th class="text-center align-middle">Equipment Id</th>
                    <th class="text-center align-middle">Total Quantity</th>
                    <th class="text-center align-middle">Sold Out</th>
                    <th class="text-center align-middle">Unit</th>
                    <th class="text-center align-middle">Image</th>
                    <th class="text-center align-middle">Action</th>
                </tr>
                </thead>
                <tbody>  
                    @if (count($equipments))
                        @foreach($equipments as $item) 
                            <tr> 
                                <td class="text-center align-middle">{{ $item['value'] }}</td>
                                <td class="text-center align-middle">{{ str_replace( array('\'', '"',';', '[', ']'), ' ', $item['child_qeuipment']->pluck('equipment_id')) }}</td>
                                <td class="text-center align-middle">{{ $item['child_qeuipment']->count() }}</td>
                                <td class="text-center align-middle">{{ $item['soldout'] }}</td>
                                <td class="text-center align-middle">គ្រឿង</td>
                                <td class="text-center align-middle"><img src="{{ getUrl($item['image']) }}" width="100"></td>
                                <td class="text-center align-middle"><a href="{{ route('equipment.show', $item['id']) }}" class="btn btn-icon edit" title="List Eqipment" data-toggle="tooltip" data-placement="top"> <i class="fas fa-list"></i> </a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><em>@lang('No records found.')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> 

    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/login.js') !!}
@stop

