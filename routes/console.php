<?php

use App\Console\Commands\UpdateSalaryCommand;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Schedule::command(UpdateSalaryCommand::class)->daily()->at('00.00')->appendOutputTo(storage_path('logs/scheduler.log'));
