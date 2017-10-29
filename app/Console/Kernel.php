<?php

namespace App\Console;

use App\Models\InvoicingSettingGeneral;
use App\Models\InvoicingSettingMaintenanceService;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SinkingFundInvoice::class,
        Commands\MaintenanceInvoice::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $due_date = null;
        try {
            $invoice_setting = InvoicingSettingGeneral::all()->first();
            $due_date = @$invoice_setting->due_date;
        } catch (\Exception $e) {}

        $schedule->command('generate:sinking-fund-invoice')
            ->daily()->when(function () use ($due_date) {
                return Carbon::today() == $due_date;
            });

        $schedule->command('generate:maintenance-invoice')->monthly();

        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
