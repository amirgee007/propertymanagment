<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarParkController extends Controller
{
    public function assignCarPark(Request $request){


        dd($request->all());

    }
}
