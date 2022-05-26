@extends('layouts.main_app')
@section('page-title', __('Revenue'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop

@section('content')
@include('partials.messages') 

<div class="card">
    <div class="card-body">

        @include('partials.button_group_transaction')
        
        <div class="row ">
            <div class="col-lg-12">
        
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-selected="true"> @lang('Equipment')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           id="authentication-tab" data-toggle="tab" href="#login-details" role="tab" aria-controls="home" aria-selected="true"> @lang('Customer')
                        </a>
                    </li>
                </ul>

                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active px-2" id="details" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                        <div class="row mb-4">
                            <div class="col-4">
                                        
                                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                                    <div class="input-group custom-search-form">
                                        <input  type="text" class="form-control input-solid" name="search" value="{{ Request::get('search') }}" placeholder="Search"/>

                                        <span class="input-group-append">
                                            @if (Request::has('search') && Request::get('search') != '')
                                                <a href="{{ route('revenue.index') }}" class="btn btn-light d-flex align-items-center" role="button"> <i class="fas fa-times text-muted"></i> </a>
                                            @endif
                                            <button class="btn btn-light" type="submit" id="search-activities-btn"><i class="fas fa-search text-muted"></i></button>
                                        </span>
                                    </div>

                                    {{ csrf_field() }} 
                                </form>
                            </div> 
                            <div class="col-8">

                                <div class="float-right">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <a href="{{ route('revenue.create') }}" class="btn btn-primary" style="width: 120px;" > <i class="fas fa-plus"></i> Revenue</a>
                                        </div>
                                    </div> 
                                </div>      
                            </div>
                        </div>

                        @include('revenue.partials.row')    
                         
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
                    
                    </div>

                    <div class="tab-pane fade px-2" id="login-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
                    @include('revenue.partials.row-customer') 
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

