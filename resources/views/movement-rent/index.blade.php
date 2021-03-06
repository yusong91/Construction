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
                        <input  type="text" class="form-control input-solid" name="search" value="{{ Request::get('search') }}" placeholder="Search"/>

                        <span class="input-group-append">
                            @if (Request::has('search') && Request::get('search') != '')
                                <a href="{{ route('movement.index') }}"  class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i></a>
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
                            <a href="{{ route('movement.create') }}" class="btn btn-primary" style="width: 180px;" ><i class="fas fa-plus"></i> Movement & Rent</a>
                        </div>
                    </div> 
                </div>      
            </div>

        </div>

        @include('movement-rent.partials.row-index')

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

