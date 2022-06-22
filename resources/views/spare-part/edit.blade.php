@extends('layouts.main_app')

@section('page-title', __('Spart-Part'))
@section('page-heading', __('Spart-Part'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Spart-Part')
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

    tr td{
        padding: 0 !important;
        margin: 0 !important;
    }
    .form-control, .custom-file-label {
        border: 0;
    }
    .form-control{border-radius:0px !important;}
    .table td, .table th { padding: 5; }

</style> 
 
<div class="card">
    <div class="card-body">

        @include('partials.button_group') 

        <form action="{{ route('sparepart.update', $edit->id) }}" method="POST"  accept-charset="UTF-8" autocomplete="off">
            @method('PUT')
            @include('spare-part.partials.row-edit')
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mt-4">Update</button>

        </form>

    </div>
</div> 

@stop

