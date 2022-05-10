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
        <fieldset class="border p-2">
            <legend>{{ isset($edit) ? 'Update Category' : 'Category' }} </legend>
            <div class="row ">
                <div class="col-12">
                    <form action="{{ isset($edit) ? route('category.update', $edit->id) : route('category.store') }}" id="user-form" method="POST" accept-charset="UTF-8">
                        @if(isset($edit))
                            @method('PUT')
                        @endif 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input type="text" required class="form-control" value="{{ $edit->value ?? '' }}"  name="value" id="value" placeholder="New Category">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" value="{{ $edit->description ?? '' }}"  name="description" id="value" placeholder="Sub Category (each sub category separate by comma)">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">{{ isset($edit) ? 'Update' : 'Create'  }} </button>
                            </div>
                        </div>
                    {{ csrf_field() }}
                    </form> 
                </div> 
            </div>
         
            @include('category.partials.row-index')

        </fieldset> 
    </div>
</div>

@stop



