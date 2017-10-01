
<tr id="car-park-id-{{$carPark->owner_car_park_id}}">
    <td>{{$carPark->owner_car_park_id}}</td>
    <td>{{$carPark->owner_car_park_id}}</td>
    <td>{{$carPark->owner_car_park_id}}</td>
    <td>
        <button type="button" data-url="{{route('delete.owner.assign.carpark' , $carPark->owner_car_park_id)}}" class="btn btn-danger car-park-delete">Delete</button>
    </td>
</tr>