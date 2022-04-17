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
        <form action="{{ route('staff.store') }}" id="user-form" method="POST" accept-charset="UTF-8">
            
            <fieldset class="border p-2 ">

                <legend>New Staff</legend>

                <div class="row">
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" required class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="a_date" name="dob" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" required name="job" placeholder="Job">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" required name="phone" placeholder="Phone">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="address" class="form-control" rows="2" placeholder="Address"></textarea> 
                        </div>
                    </div>
                </div>

            </fieldset>
            @csrf
            <button type="submit" class="btn btn-primary mt-4">Create</button>
            
        </form>
    </div>
</div>

@stop

