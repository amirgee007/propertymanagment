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
            OwnerCarPark::firstOrCreate($request->except('_token'));
            $response = ['status' => 'saved'];

        } catch (\Exception $ex) {
            $response = ['status' => 'error'];
        }
        return response()->json($response);

    }
}
