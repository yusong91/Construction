@extends('layouts.main_app')

@section('page-title', __('Movement'))


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

.test {

    width: 50%;
  }

</style>

<div class="card">
    <div class="card-body">

        @include('partials.button_group_transaction')
        
        <div class="row ">
            <div class="col-4"> 
                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                    <div class="input-group custom-search-form">
                        <input  type="text"
                                class="form-control input-solid"
                                name="search"
                                value="{{ Request::get('search') }}"
                                placeholder="Search"/>

                                            <span class="input-group-append">
                                                  @if (Request::has('search') && Request::get('search') != '')
                                                    <a href="{{ route('movement.index') }}" 
                                                    class="btn btn-light d-flex align-items-center"
                                                    role="button">
                                                        <i class="fas fa-times text-muted"></i>
                                                    </a>
                                                @endif
                                                <button class="btn btn-light" type="submit" id="search-activities-btn">
                                                    <i class="fas fa-search text-muted"></i>
                                                </button>
                                            </span>

                             </div>

                        {{ csrf_field() }}
                </form>
            </div> 

            <div class="col-8">

                <div class="float-right">
                    <div class="row">
                        <div class="col-xl-5 col-md-5">
                            <a href="{{ route('movement.create') }}" class="btn btn-primary" style="width: 180px;" >+ Movement & Rent</a>
                        </div>
                    </div> 
                </div>      
            </div>

        </div>

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped" style="width: 2000px;">
                <thead> 
                    <th class="text-center">No</th>
                    <th class="text-center" style="width: 100 px;">Equipment Type</th>
                    <th class="text-center" style="width: 100 px;">Equipment Id</th>
                    <th class="text-center" style="width: 100 px;">Company Name</th>
                    <th class="text-center" style="width: 200 px;">Customer Name</th>
                    <th class="text-center" style="width: 100 px;">Customer Telephone</th>
                    <th class="text-center" style="width: 200 px;">Date</th>
                    <th class="text-center" style="width: 200 px;">From Location</th>
                    <th class="text-center" style="width: 200 px;">To Location</th>
                    <th class="text-center" style="width: 200 px;">Expected Number of Working Days</th>
                    <th class="text-center" style="width: 100 px;">Action</th>
                    
                </thead>
                <tbody> 

                @if(count($movements))
                    @foreach($movements as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->index + 1 }}</td>
                            <td class="text-center align-middle">{{ $item->parent_type->value }}</td>
                            <td class="text-center align-middle">{{ $item->parent_equipment->equipment_id }}</td>
                            <td class="text-center align-middle">{{ $item->parent_customer->company_name }}</td>
                            <td class="text-center align-middle">{{ $item->customer_name }}</td>
                            <td class="text-center align-middle">{{ $item->customer_phone }}</td>
                            <td class="text-center align-middle">{{ getDateFormat($item->date) }}</td>
                            <td class="text-center align-middle">{{ $item->from_location }}</td>
                            <td class="text-center align-middle">{{ $item->to_location }}</td>
                            <td class="text-center align-middle">{{ $item->expected_date }}</td>
                            <td class="text-center align-middle">
                            
                                <!-- <a href="" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-list"></i> </a> -->

                                <a href="{{ route('movement.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                                <a href="{{ route('movement.destroy', $item->id) }}"
                                    class="btn btn-icon"
                                    data-action=""
                                    title="Delete" 
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-method="DELETE"
                                    data-confirm-title="@lang('app.please_confirm')"
                                    data-confirm-text="@lang('app.confirm_delete')"
                                    data-confirm-delete="@lang('app.yes_proceed')">
                                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9"><em>@lang('app.no_records_found')</em></td>
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

