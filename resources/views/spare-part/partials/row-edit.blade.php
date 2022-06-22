<div class="table-responsive" style="padding-top: 10px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center align-middle">Name</th>
                <th class="text-center align-middle">Quantity</th>
                <th class="text-center align-middle">Unit</th>
                <th class="text-center align-middle">Unit Price($)</th>
            </tr>
        </thead>
        <tbody> 
                <tr> 
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" value="{{ $edit->name }}">
                        </div>
                    </td> 

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="quantity" value="{{ $edit->quantity }}">
                        </div>
                    </td> 
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="unit" value="{{ $edit->unit }}">
                        </div>
                    </td> 
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="unit_price" value="{{ $edit->unit_price }}">
                        </div>
                    </td> 
                        
                <tr>
        </tbody>
    </table>
</div>

