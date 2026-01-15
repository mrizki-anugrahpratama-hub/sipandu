<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule; // <-- Pastikan 'use' ini ada

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('arsip:auto-move-expired')->dailyAt('00:00');
Schedule::command('arsip:transition-to-appraisal')->dailyAt('00:00');