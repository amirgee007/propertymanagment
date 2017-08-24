<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeterController extends Controller
{
    protected $viewPath = 'admin.meter-management';

    public function index() {
        return view("{$this->viewPath}.index");
    }

    public function create() {
        return view("{$this->viewPath}.create");
    }

    public function store(Request $request) {

    }
}
