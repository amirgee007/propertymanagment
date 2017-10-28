<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\SinkingFund;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SinkingFundInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sinking-fund-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto invoice generating against all bills.';

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
        try {
            $sinking_funds = SinkingFund::all();

            $invoice_data = [];
            $count = 0;
            foreach ($sinking_funds as $fund) {
                $count++;
                $this->info('-----');
                $this->info('Record Processing');
                $invoice_data[] = [
                    'owner_id' => $fund->lot->ownerWithLot->lot_owner_id,
                    'lot_id' => $fund->lot->lot_id,
                    'date' => $fund->date,
                    'invoice_trans_des' => $fund->description,
                    'invoice_quantity' => 1, // ToDo: setting default to 1, change this accordingly
                    'invoice_uom' => ' ',
                    'invoice_charge_rate' => 0,
                    'invoice_amount' => $fund->amount,
                    'invoice_status' => Invoice::UNPAID,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'type' => Invoice::SINKING,
                ];
                $this->info('Record Processed ' . $count);
                $this->info('-----');
            }

            Invoice::query()->insert($invoice_data);

            $this->info('Sinking invoices generated successfully.');
        } catch (\Exception $e) {

            Log::error('Oops, Error while creating Sinking recurring invoices.' . $e->getMessage());
            $this->info('Oops, Error while creating Sinking recurring invoices.');
        }
    }
}
