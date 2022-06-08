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
        <form action="{{ route('warehouse.update', $edit->id) }}" id="user-form" method="POST" accept-charset="UTF-8">
            @method('PUT')
            <fieldset class="border p-2 ">

                <legend>Update Warehouse</legend>

                <div class="row">
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" required class="form-control" name="name" placeholder="Name" value="{{ $edit->name }}">
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="lat" placeholder="Lat" value="{{ $edit->lat }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="lon" placeholder="Lon" value="{{ $edit->lon }}">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="address" class="form-control" rows="2" placeholder="Address">{{ $edit->address }}</textarea> 
                        </div>
                    </div>
                </div>

            </fieldset>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            
        </form>
    </div>
</div>

@stop

