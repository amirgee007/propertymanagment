<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{

    public function viewProfile()
    {
        return view('/admin/owner-managment/add');
    }

    public function store(Request $request){


        dd($request->all());


    }





}
