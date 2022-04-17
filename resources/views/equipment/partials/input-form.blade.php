<form action="{{ route('equipment.store') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">
        
    <fieldset class="border p-2 " style="overflow-x: scroll;">

        <legend>New Equipment</legend>

        <div class="col-4 mb-3 p-0">
            
            <div class="form-border">
            
                <select class="js-example-responsive form-control" required name="equip_type_id" data-live-search="true">
                    @foreach($equipmentTypes as $item)
                        <option value="{{ $item->id }}">{{ $item->value }}</option>
                    @endforeach 
                </select>

            </div>

        </div>
                
        @include('equipment.partials.row') 
                        
    </fieldset>
    @csrf
        <button type="submit" class="btn btn-primary mt-3 mb-2">Create</button>

</form>
    
