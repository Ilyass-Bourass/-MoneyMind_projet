<?php

namespace App\Console\Scheduling;

use Illuminate\Console\Scheduling\Schedule;

class UpdateSalaryScheduling
{
    public function __invoke(Schedule $schedule): void
    {
        $schedule->command('users:update-salary')->daily();
    }
} 