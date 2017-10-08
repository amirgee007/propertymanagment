<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConfigLotType;
use App\Models\InvoicingSettingGeneral;
use App\Models\InvoicingSettingMaintenanceService;
use App\Models\InvoicingSettingUtility;
use App\Models\LotType;
use App\Models\TaxType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicingSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminRole');
    }

    public function add()
    {
        $lot_types = LotType::all();
        $taxTypes = TaxType::isActive()->get();
        $general = InvoicingSettingGeneral::where('user_id', auth()->user()->id)->first();
        $utility = InvoicingSettingUtility::where('user_id', auth()->user()->id)->first();
        $maintenance = InvoicingSettingMaintenanceService::where('user_id', auth()->user()->id)->first();
        return view('admin.invoicing-setting.add', compact('general', 'utility', 'maintenance', 'lot_types', 'taxTypes'));
    }

    public function edit(Request $request)
    {
        $general = $request->general;

        $utility = $request->utilitySettings;
        $maintenance = $request->maintenanceServiceSettings;


        if ($utility['billing_start_date']) {
            $utility['billing_start_date'] = Carbon::createFromFormat('d-m-Y', $utility['billing_start_date']);
        }
        if ($utility['billing_end_date']) {
            $utility['billing_end_date'] = Carbon::createFromFormat('d-m-Y', $utility['billing_end_date']);
        }
        if ($maintenance['billing_end_date']) {
            $maintenance['billing_end_date'] = Carbon::createFromFormat('d-m-Y', $maintenance['billing_end_date']);
        }

        $general['user_id'] = $utility['user_id'] = $maintenance['user_id'] = auth()->user()->id;
        $InvoicingSettingGeneral = InvoicingSettingGeneral::where('user_id', auth()->user()->id)->first();
        $InvoicingSettingUtility = InvoicingSettingUtility::where('user_id', auth()->user()->id)->first();
        $InvoicingSettingMaintenanceService = InvoicingSettingMaintenanceService::where('user_id', auth()->user()->id)->first();
        if ($InvoicingSettingGeneral) {
            $InvoicingSettingGeneral->update($general);
        } else {
            InvoicingSettingGeneral::Create($general);

        }
        if ($InvoicingSettingUtility) {
            $InvoicingSettingUtility->update($utility);

        } else {
            InvoicingSettingUtility::firstOrCreate($utility);
        }
        if ($InvoicingSettingMaintenanceService) {
            $InvoicingSettingMaintenanceService->update($maintenance);

        } else {
            $InvoicingSettingMaintenanceService = InvoicingSettingMaintenanceService::firstOrCreate($maintenance);
        }

        if ($request->has('lotType')) {
            foreach ($request->get('lotType') as $key => $value) {
                $config_type = ConfigLotType::where('lot_type_id', $key)->first();
                if ($config_type) {
                    if($InvoicingSettingMaintenanceService->fee_charged == 'property_size'){
                        $config_type->update([
                            'lot_type_id' => $key,
                            'charging_rate' => $value,
                            'fee_charge' => null
                        ]);
                    } else{
                        $config_type->update([
                            'lot_type_id' => $key,
                            'fee_charge' => $value,
                            'charging_rate' => null,
                        ]);
                    }
                } else {
                    if($InvoicingSettingMaintenanceService->fee_charged == 'property_size'){
                        ConfigLotType::create([
                            'lot_type_id' => $key,
                            'charging_rate' => $value,
                            'fee_charge' => null
                        ]);
                    } else{
                        ConfigLotType::create([
                            'lot_type_id' => $key,
                            'fee_charge' => $value,
                            'charging_rate' => null,
                        ]);
                    }
                }

            }
        }


        flash('Invoicing Setting Config successfully.')->success();
        return redirect()->route('invoicing-setting.add');
    }
}
