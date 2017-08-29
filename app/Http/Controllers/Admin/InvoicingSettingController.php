<?php

namespace App\Http\Controllers\Admin;

use App\Models\InvoicingSettingGeneral;
use App\Models\InvoicingSettingMaintenanceService;
use App\Models\InvoicingSettingUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicingSettingController extends Controller
{
    public function add(){
        $general= InvoicingSettingGeneral::where('user_id',auth()->user()->id)->first();
        $utility= InvoicingSettingUtility::where('user_id',auth()->user()->id)->first();
        $maintenance= InvoicingSettingMaintenanceService::where('user_id',auth()->user()->id)->first();

        return view('admin.invoicing-setting.add',compact('general','utility','maintenance'));
    }

    public function edit(Request $request){
        $general = $request->general;
        $utility = $request->utilitySettings;
        $maintenance = $request->maintenanceServiceSettings;


//        try {
            if ($utility['billing_start_date']){

                $utility['billing_start_date'] = Carbon::parse($utility['billing_start_date']);
            }

            $general['user_id'] = $utility['user_id'] = $maintenance['user_id'] = auth()->user()->id;
            $InvoicingSettingGeneral= InvoicingSettingGeneral::where('user_id',auth()->user()->id)->first();
            $InvoicingSettingUtility= InvoicingSettingUtility::where('user_id',auth()->user()->id)->first();
            $InvoicingSettingMaintenanceService= InvoicingSettingMaintenanceService::where('user_id',auth()->user()->id)->first();
            if($InvoicingSettingGeneral){
                $wasim=$InvoicingSettingGeneral->update($general);
            }else{
                InvoicingSettingGeneral::Create($general);

            }
           if($InvoicingSettingUtility){
               $InvoicingSettingUtility->update($utility);

            }else{
               InvoicingSettingUtility::firstOrCreate($utility);
            }
           if($InvoicingSettingUtility){
               $InvoicingSettingMaintenanceService->update($maintenance);

            }else{
               InvoicingSettingMaintenanceService::firstOrCreate($maintenance);
            }


            flash('Invoicing Setting Config successfully.')->success();
            return redirect()->route('invoicing-setting.add');
//        } catch (\Exception $e) {
//            flash('Error while Invoicing Setting Config.')->error();
//            return back();
//        }
    }
}
