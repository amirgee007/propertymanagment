<select name="meter_id"  class="form-control select-s input-sm">
    <option value="" >Choose Meter Id</option>
    @foreach($meter as $meter_id => $meter_Name )
        <option value="{{$meter_id}}">{{$meter_Name}}</option>
    @endforeach
</select>
