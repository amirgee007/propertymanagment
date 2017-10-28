<?php

namespace App\Console\Commands;

use App\Models\ConfigLotType;
use App\Models\Invoice;
use App\Models\InvoicingSettingMaintenanceService;
use App\Models\OwnerLot;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MaintenanceInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:maintenance-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto generate invoice against system setting of maintenance.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $maintenance = InvoicingSettingMaintenanceService::query()->first();

        if ($maintenance) {
            switch ($maintenance->billing_ending) {
                case 'never':
                    return $this->generateInvoice();
                    break;
                case 'on_specific_date':
                    $ending_date = Carbon::parse($maintenance->billing_end_date);
                    if ($ending_date > Carbon::today()) {
                        return $this->generateInvoice();
                    }
                    break;
                case 'after_number_of_billing':
                    if (Carbon::today()->day > $maintenance->after_billing_day) {
                        return $this->generateInvoice();
                    }
                    break;
                default:
                    return '';
                    break;
            }
        }
    }


    private function generateInvoice()
    {
        try {

            $maintenance = InvoicingSettingMaintenanceService::query()->first();

            if (! $maintenance) {
                $this->info('No data found.');
                return false;
            }

            $lot_type_ids = ConfigLotType::all()->pluck('lot_type_id');

            $invoice_data = [];
            $count = 0;
            $owner_lots = OwnerLot::query()->whereIn('lot_type_id', $lot_type_ids)->get();

            foreach ($owner_lots as $owner_lot) {
                $count++;
                $this->info('-----');
                $this->info('Record Processing');

                if ($maintenance->fee_charged == InvoicingSettingMaintenanceService::PROPERTY_SIZE) {
                    $amount = @ConfigLotType::query()->where('lot_type_id', $owner_lot->lot_type_id)->first()->charging_rate;
                } else {
                    $amount = @ConfigLotType::query()->where('lot_type_id', $owner_lot->lot_type_id)->first()->fee_charge;
                }

                $invoice_data[] = [
                    'owner_id' => $owner_lot->lot_owner_id,
                    'lot_id' => $owner_lot->lot_id,
                    'date' => $maintenance->created_at,
                    'invoice_trans_des' => @$owner_lot->lot->lot_name,
                    'invoice_quantity' => 1, // ToDo: setting default to 1, change this accordingly
                    'invoice_uom' => ' ',
                    'invoice_charge_rate' => 0,
                    'invoice_amount' => is_null($amount) ? 0 : $amount,
                    'invoice_status' => Invoice::UNPAID,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'type' => Invoice::MAINTENANCE,
                ];

                $this->info('Record Processed ' . $count);
                $this->info('-----');
            }

            Invoice::query()->insert($invoice_data);

            Log::info('Maintenance Recurring Invoice Command:Total '.$count.' Maintenance invoices generated successfully.');

            $this->info('Maintenance invoice generated successfully.');

        } catch (\Exception $e) {

            Log::error('Oops, Error while creating maintenance recurring invoices.' . $e->getMessage());
            $this->info('Oops, Error while creating maintenance recurring invoices.');
        }
    }
}
