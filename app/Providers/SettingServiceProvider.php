<?php

namespace App\Providers;

use App\Models\InvoicingSettingGeneral;
use App\Models\InvoicingSettingMaintenanceService;
use App\Models\InvoicingSettingUtility;
use App\Models\SystemSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $system_setting = SystemSetting::first();
            $invoice_setting = InvoicingSettingGeneral::first();
            $setting_maintenance = InvoicingSettingMaintenanceService::first();
            $setting_utility = InvoicingSettingUtility::first();

            config([
                'tax' => @$system_setting->tax == 1 ? true : false,
                'interest' => @$system_setting->interest == 1 ? true : false,
                'client_access' => @$system_setting->client_access == 1 ? true : false,
                'utility_module' => @$system_setting->utility_module == 1 ? true : false,
                'sinking_funds_module' => @$system_setting->sinking_funds_module == 1 ? true : false,
                'car_parks_module' => @$system_setting->car_parks_module == 1 ? true : false,

                'invoice_creation_day' => @$invoice_setting->invoice_creation_day ? $invoice_setting->invoice_creation_day : 0,
                'invoice_due_date' => @$invoice_setting->invoice_due_date ? Carbon::today()->addDays($invoice_setting->invoice_due_date) : null,
                'interest_rate' => @$invoice_setting->interest_rate ? $invoice_setting->interest_rate : null,

                'invoice_repeat_month' => @$setting_maintenance->invoice_repeat_month ? $setting_maintenance->invoice_repeat_month : null,
                'fee_charged' => @$setting_maintenance->fee_charged ? $setting_maintenance->fee_charged : null,
                'charges_per_sqft' => @$setting_maintenance->charges_per_sqft ? $setting_maintenance->charges_per_sqft : null,
                'billing_ending' => @$setting_maintenance->billing_ending ? $setting_maintenance->billing_ending : null,
                'maintenance_tax_type_id' => @$setting_maintenance->tax_type_id ? $setting_maintenance->tax_type_id : null,

                'utility_invoice_repeat_month' => @$setting_utility->invoice_repeat_month ? $setting_utility->invoice_repeat_month : null,
                'billing_start_date' => @$setting_utility->billing_start_date ? $setting_utility->billing_start_date : null,
                'utility_billing_ending' => @$setting_utility->billing_ending ? $setting_utility->billing_ending : null,
                'utility_tax_type_id' => @$setting_utility->tax_type_id ? $setting_utility->tax_type_id : null,
            ]);
        }catch (\Exception $ex) {
            Log::error('SettingsServiceProvider' , $ex->getTrace());
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
