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

