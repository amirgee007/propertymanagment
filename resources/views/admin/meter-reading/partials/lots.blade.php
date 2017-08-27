
        <select name="lot_id" id="lot_id" class="form-control select-s input-sm">
            <option value="" >Choose Lots</option>
            @foreach($lots as $lot_id => $lot_Name )
                <option value="{{$lot_id}}">{{$lot_Name}}</option>
            @endforeach
        </select>
