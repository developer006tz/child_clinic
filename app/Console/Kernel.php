<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
 

    protected function schedule(Schedule $schedule)
    {
        // Schedule a call for 1 day in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(4));
            })->get();
            foreach ($records as $record) {

                $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother);
                $message = $record->message;
                beem_sms($phone, $message);
            }
        })->dailyAt('06:33');

        // Schedule a call for 2 days in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(5));
            })->get();
            foreach ($records as $record) {
                $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother);
                $message = $record->message;
                beem_sms($phone, $message);
            }
        })->dailyAt('06:33');

        // Schedule a call for 3 days in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(6));
            })->get();
            foreach ($records as $record) {
                 $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother);
                $message = $record->message;
                beem_sms($phone, $message);
            }
        })->dailyAt('06:33');

        // Schedule a call for 4 days in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(7));
            })->get();
            foreach ($records as $record) {
                 $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother);
                $message = $record->message;
                beem_sms($phone, $message);
            }
        })->dailyAt('06:33');

        // Schedule a call for 5 days in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(8));
            })->get();
            foreach ($records as $record) {
                 $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother);
                $message = $record->message;
                beem_sms($phone, $message);
            }
        })->dailyAt('06:33');

        // Schedule a call for 6 days in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(9));
            })->get();
            foreach ($records as $record) {
                 $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
                $phone = validatePhoneNumber($mother);
                $message = $record->message;
                beem_sms($phone, $message);
            }
        })->dailyAt('06:33');
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
