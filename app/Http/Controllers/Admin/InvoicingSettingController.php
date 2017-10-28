<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigLotType;
use App\Models\InvoicingSettingGeneral;
use App\Models\InvoicingSettingMaintenanceService;
use App\Models\InvoicingSettingUtility;
use App\Models\LotType;
use App\Models\TaxType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoicingSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminRole');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $lot_types = LotType::all();
        $taxTypes = TaxType::query()->isActive()->get();
        $general = InvoicingSettingGeneral::query()->where('user_id', auth()->user()->id)->first();
        $utility = InvoicingSettingUtility::query()->where('user_id', auth()->user()->id)->first();
        $maintenance = InvoicingSettingMaintenanceService::query()->where('user_id', auth()->user()->id)->first();

        return view('admin.invoicing-setting.add', compact('general', 'utility', 'maintenance', 'lot_types', 'taxTypes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $general        = $request->general;
        $utility        = $request->utilitySettings;
        $maintenance    = $request->maintenanceServiceSettings;

        $general['user_id'] = $utility['user_id'] = $maintenance['user_id'] = auth()->user()->id;
        list($utility, $maintenance) = $this->setDateVariables($utility, $maintenance);

        $this->createOrUpdateGeneralSetting($general);
        $this->createOrUpdateUtilitySetting($utility);
        $maintenance_setting = $this->createOrUpdateMaintenanceSetting($maintenance);

        if ($maintenance_setting->fee_charged == 'property_size')
            $lot_types = $request->chargeRateLotType;
        else
            $lot_types = $request->feeChargeLotType;

        $this->addFeeChargeData($lot_types, $maintenance_setting);

        flash('Invoicing setting configuration updated successfully.')->success();
        return redirect()->route('invoicing-setting.add');
    }

    /**
     * @param $utility
     * @param $maintenance
     * @return array
     */
    private function setDateVariables($utility, $maintenance)
    {
        if ($utility['billing_start_date'])
            $utility['billing_start_date'] = $this->carbonFormat($utility['billing_start_date']);

        if ($utility['billing_end_date'])
            $utility['billing_end_date'] = $this->carbonFormat($utility['billing_end_date']);

        if ($maintenance['billing_end_date'])
            $maintenance['billing_end_date'] = $this->carbonFormat($maintenance['billing_end_date']);

        return array($utility, $maintenance);
    }

    /**
     * @param $general
     */
    private function createOrUpdateGeneralSetting($general)
    {
        $general_invoice = InvoicingSettingGeneral::query()->where('user_id', auth()->user()->id)->first();

        if ($general_invoice)
            $general_invoice->update($general);
        else
            InvoicingSettingGeneral::query()->create($general);
    }

    /**
     * @param $utility
     */
    private function createOrUpdateUtilitySetting($utility)
    {
        $utility_invoice = InvoicingSettingUtility::query()->where('user_id', auth()->user()->id)->first();

        if ($utility_invoice)
            $utility_invoice->update($utility);
        else
            InvoicingSettingUtility::query()->firstOrCreate($utility);
    }

    /**
     * @param $maintenance
     */
    private function createOrUpdateMaintenanceSetting($maintenance)
    {
        $maintenance_invoice = InvoicingSettingMaintenanceService::query()->where('user_id', auth()->user()->id)->first();

        if ($maintenance_invoice)
            $maintenance_invoice->update($maintenance);
        else
            $maintenance_invoice = InvoicingSettingMaintenanceService::query()->firstOrCreate($maintenance);

        return $maintenance_invoice;
    }

    /**
     * @param $lot_types
     * @param $maintenance_setting
     */
    private function addFeeChargeData($lot_types, $maintenance_setting)
    {
        foreach ($lot_types as $key => $value) {
            $config_type = ConfigLotType::query()->where('lot_type_id', $key)->first();
            if ($config_type) {
                if ($maintenance_setting->fee_charged == 'property_size') {
                    $config_type->update([
                        'lot_type_id' => $key,
                        'charging_rate' => $value,
                        'fee_charge' => null
                    ]);
                } else {
                    $config_type->update([
                        'lot_type_id' => $key,
                        'fee_charge' => $value,
                        'charging_rate' => null,
                    ]);
                }
            } else {
                if ($maintenance_setting->fee_charged == 'property_size') {
                    ConfigLotType::query()->create([
                        'lot_type_id' => $key,
                        'charging_rate' => $value,
                        'fee_charge' => null
                    ]);
                } else {
                    ConfigLotType::query()->create([
                        'lot_type_id' => $key,
                        'fee_charge' => $value,
                        'charging_rate' => null,
                    ]);
                }
            }

        }
    }

    /**
     * @param $column
     * @return carbon formatted date
     */
    private function carbonFormat($column)
    {
        return Carbon::createFromFormat('d-m-Y', $column);
    }

}
