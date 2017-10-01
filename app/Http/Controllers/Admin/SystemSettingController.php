<?php

namespace App\Http\Controllers\Admin;

use App\Models\SystemSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('SuperAdminRole');
    }

    public function create()
    {
        $systemSetting = SystemSetting::where('user_id', auth()->user()->id)->first();
        return view('admin.system-setting.create', compact('systemSetting'));
    }

    public function edit(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        $systemSetting = SystemSetting::firstOrNew(array('user_id' => auth()->user()->id));
        if ($request->has('tax'))
            $systemSetting->tax = $request->tax;
        else
            $systemSetting->tax = 0;

        if ($request->has('interest'))
            $systemSetting->interest = $request->interest;
        else
            $systemSetting->interest = 0;

        if ($request->has('client_access'))
            $systemSetting->client_access = $request->client_access;
        else
            $systemSetting->client_access = 0;

        if ($request->has('utility_module'))
            $systemSetting->utility_module = $request->utility_module;
        else
            $systemSetting->utility_module = 0;

        if ($request->has('sinking_funds_module'))
            $systemSetting->sinking_funds_module = $request->sinking_funds_module;
        else
            $systemSetting->sinking_funds_module = 0;

        if ($request->has('car_parks_module'))
            $systemSetting->car_parks_module = $request->car_parks_module;
        else
            $systemSetting->car_parks_module = 0;

        $systemSetting->save();

        flash('Config System Setting successfully.')->success();
        return redirect()->route('system-setting.create');
    }
}
