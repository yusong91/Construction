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
            <legend>New Spare Part</legend>
            <div class="row ">
                <div class="col-12">
                    <form action="{{ isset($edit) ? route('sparepart.update', $edit->id) : route('sparepart.store') }}" id="user-form" method="POST" accept-charset="UTF-8">
                        @if(isset($edit))
                            @method('PUT')
                        @endif 
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" required class="form-control" value="{{ $edit->value ?? '' }}"  name="value" id="value" placeholder="Spare Part">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">{{ isset($edit) ? 'Update' : 'Create'  }} </button>
                            </div>
                        </div>
                    {{ csrf_field() }}
                    </form>
                </div> 
            </div>
        </fieldset>  

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Spare Part</th>
                    <th class="text-center align-middle">Action</th>
                    
                </thead>
                <tbody>    
                    
                    @if($spareparts)

                        @foreach($spareparts as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->index + 1 }}</td>
                            <td class="text-center align-middle">{{ $item->value }}</td>
                            
                            <td class="text-center align-middle">
                                <a href="{{ route('sparepart.edit', $item->id) }}"
                                        class="btn btn-icon edit"
                                        title="Update"
                                        data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-edit"></i> 
                                </a>

                                <a href="{{ route('sparepart.destroy', $item->id) }}"
                                    class="btn btn-icon"
                                    data-action=""
                                    title="Delete Project" 
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
                            <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif

                </tbody>
            </table> 
        </div>

    </div>
</div>

@stop

@section('scripts')
    
    <!-- {!! JsValidator::formRequest('Vanguard\Http\Requests\SparePartRequest', '#user-form') !!} -->
@stop

