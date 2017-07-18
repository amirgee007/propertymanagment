<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{


    public function dashboard(){
        return view('admin.dashboard');
    }

    public function viewProfile(){
        return view('admin.pages.view-profile');

    }
}
