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
                                <a href="{{ route('inventory.index') }}" class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i> </a>
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
                        <div class="col-xl-1 col-md-5 pr-4">
                            <a href="" class="vertical-center"  ><img src="{{ url('assets/img/excel.png') }}" width="25" ></a>
                        </div>
                        <div class="col-xl-5 col-md-5">
                            <a href="{{ route('inventory.create') }}" class="btn btn-primary" style="width: 147px;" >+ New Item</a>
                        </div>
                    </div>  
                </div>           
            </div>
        </div>

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped" style="width: 2000px;">
                <thead> 
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle" style="width: 200px;">Item Name</th>
                    <th class="text-center align-middle" style="width: 300px;">Warehouse Location</th>
                    <th class="text-center align-middle" style="width: 80px;">Quantity</th>
                    <th class="text-center align-middle" style="width: 100px;">In Stock</th>
                    <th class="text-center align-middle" style="width: 100px;">Price</th>
                    <th class="text-center align-middle" style="width: 100px;">Unit</th>
                    <th class="text-center align-middle" style="width: 100px;">Used</th>
                    <th class="text-center align-middle" style="width: 200px;">Vender</th>
                    <th class="text-center align-middle" style="width: 200px;">Menufacture</th>
                    <th class="text-center align-middle" style="width: 150px;">Purchased Date</th>
                    <th class="text-center align-middle" style="width: 80px;">Image</th>
                    <th class="text-center align-middle" style="width: 400px;">Note</th>
                    <th class="text-center align-middle">Action</th>
                    
                </thead>
                <tbody> 
                    
                @if($inventory_groups)
                    @foreach($inventory_groups as $items)
                    <tr>
                        <th></th>
                        <th scope="row" colspan="13"><h5> {{ $items[0]->parent_sparepart['value'] }}</h5></th>
                    </tr>
                        @foreach($items as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->index + 1}}</td>
                            <td class="text-center align-middle">{{ $item->name }}</td>
                            <td class="text-center align-middle">{{ $item->parent_warehouse->name ?? '' }}</td>
                            <td class="text-center align-middle">{{ $item->quantity }}</td>
                            <td class="text-center align-middle">{{ $item->quantity - $item->used }}</td>
                            <td class="text-center align-middle">${{ $item->price }}</td> 
                            <td class="text-center align-middle">{{ $item->unit }}</td>   
                            <td class="text-center align-middle">{{ $item->used }}</td>   
                            <td class="text-center align-middle">{{ $item->vender }}</td>   
                            <td class="text-center align-middle">{{ $item->menufacture }}</td> 
                            <td class="text-center align-middle">{{ getDateFormat($item->purchased_date) }}</td>
                            <td class="text-center align-middle"><img src="{{ getUrl($item->image) }}" class="rounded mx-auto d-block" alt="" style="width: 100px;"></td>
                            <td class="text-center align-middle">{{ $item->note }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route('inventory.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"data-confirm-title="@lang('app.please_confirm')"data-confirm-text="@lang('app.confirm_delete')"data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                @else 
                    <tr>
                        <td colspan="13"><em>@lang('app.no_records_found')</em></td>
                    </tr>
                @endif

                </tbody>
            </table> 
        </div>
    </div>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination"> 
        <?php $page = $paginate->current_page; ?>
        @foreach ($paginate->links as $item)
            <?php 
                $active = $item->label == $page ? 'active' : '';
            ?> 
            <li class="page-item {{$active}}"><a class="page-link" href="{{ $item->url }}"><?php echo $item->label; ?></a></li>
        @endforeach 
    </ul>
</nav>

@stop

