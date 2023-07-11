<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ExecuteSchedule extends Command
{
    protected $signature = 'schedule:execute';

    public function handle()
    {
        $process = new Process(['php', 'artisan', 'schedule:work']);
        $process->start();
        sleep(180); // Wait for 3 minutes (180 seconds)
        $process->stop();
    }
}