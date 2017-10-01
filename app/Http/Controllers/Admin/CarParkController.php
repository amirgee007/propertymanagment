<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarPark;
use App\Models\OwnerCarPark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarParkController extends Controller
{
    public function assignCarPark(Request $request)
    {
        try {
            $carPark = OwnerCarPark::create($request->except('_token'));

            $response = [
                'status' => 'saved',
                'ownerCarPark' => $carPark,
                'delete_url' => route('delete.owner.assign.carpark' , $carPark)
            ];

        } catch (\Exception $ex) {
            $response = ['status' => 'error'];
        }
        return response()->json(
            $response);

    }

    public function delete($id) {
        $carPark = OwnerCarPark::where('owner_car_park_id' , $id)->first();

        $carPark->delete();

        return response()->json([
            'id' => $id,
            'status' => true
        ]);

    }
}
