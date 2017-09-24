<?php

namespace App\Http\ViewComposer;

use App\User;
use Illuminate\View\Factory as View;
use App\Models\InvoicingSettingGeneral;
use App\Models\InvoicingSettingMaintenanceService;
use App\Models\InvoicingSettingUtility;
use App\Models\SystemSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SystemSettingData
{
    /**
     * The user implementation.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * SystemSettingData constructor.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose()
    {
        $user_id = @$this->user->id;

        try {
            $system_setting = SystemSetting::byUser($user_id)->first();
            $invoice_setting = InvoicingSettingGeneral::byUser($user_id)->first();
            $setting_maintenance = InvoicingSettingMaintenanceService::byUser($user_id)->first();
            $setting_utility = InvoicingSettingUtility::byUser($user_id)->first();

            config([

                'invoice' => [
                    'tax' => @$system_setting->tax == 1 ? true : false,
                    'interest' => @$system_setting->interest == 1 ? true : false,
                    'client_access' => @$system_setting->client_access == 1 ? true : false,
                    'utility_module' => @$system_setting->utility_module == 1 ? true : false,
                    'sinking_funds_module' => @$system_setting->sinking_funds_module == 1 ? true : false,
                    'car_parks_module' => @$system_setting->car_parks_module == 1 ? true : false,
                ],

                'invoice_setting' => [
                    'invoice_creation_day' => @$invoice_setting->invoice_creation_day ? $invoice_setting->invoice_creation_day : 0,
                    'invoice_due_date' => @$invoice_setting->due_date,
                    'interest_rate' => @$invoice_setting->interest_rate ? $invoice_setting->interest_rate : null,
                ],

                'maintenance' => [
                    'invoice_repeat_month' => @$setting_maintenance->invoice_repeat_month ? $setting_maintenance->invoice_repeat_month : null,
                    'fee_charged' => @$setting_maintenance->fee_charged ? $setting_maintenance->fee_charged : null,
                    'charges_per_sqft' => @$setting_maintenance->charges_per_sqft ? $setting_maintenance->charges_per_sqft : null,
                    'billing_ending' => @$setting_maintenance->billing_ending ? $setting_maintenance->billing_ending : null,
                    'tax_type_id' => @$setting_maintenance->tax_type_id ? $setting_maintenance->tax_type_id : null,
                ],

                'utility' => [
                    'invoice_repeat_month' => @$setting_utility->invoice_repeat_month ? $setting_utility->invoice_repeat_month : null,
                    'billing_start_date' => @$setting_utility->billing_start_date ? $setting_utility->billing_start_date : null,
                    'billing_ending' => @$setting_utility->billing_ending ? $setting_utility->billing_ending : null,
                    'tax_type_id' => @$setting_utility->tax_type_id ? $setting_utility->tax_type_id : null,
                ]

            ]);

        } catch (\Exception $e) {
            Log::error('SettingsServiceProvider', $e->getTrace());
        }
    }

}
