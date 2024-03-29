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
        $time = \App\Models\ScheduleTime::where('id', 1)->first()->time;
        $formattedTime = \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i');

        // Schedule a call for 1 day in the future
        $schedule->call(function () {
            $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
                $query->where('date_start', '>=', now()->addDays(4));
            })->get();
            foreach ($records as $record) {

                $mother = \App\Models\Mother::find($record->mother_id);
                $phone = validatePhoneNumber($mother->phone);
                $message = $record->message;

                $sms = beem_sms($phone, $message);
                save_sms($message,$phone, $sms);
                if($sms=='1'){
                    $schedule_sent_successfull = \App\Models\MotherSchedules::find($record->id);
                    $schedule_sent_successfull->update(['status'=>'1']);
                }

            }
        })->dailyAt($formattedTime);

        // Schedule a call for 2 days in the future
        // $schedule->call(function () {
        //     $records = \App\Models\MotherSchedules::whereHas('schedule', function ($query) {
        //         $query->where('date_start', '>=', now()->addDays(5));
        //     })->get();
        //     foreach ($records as $record) {
        //         $mother = \App\Models\Mother::find($record->mother_id)->first()->phone;
        //         $phone = validatePhoneNumber($mother);
        //         $message = $record->message;
        //         beem_sms($phone, $message);
        //     }
        // })->dailyAt($formattedTime);

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
