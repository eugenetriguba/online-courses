<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('createTestUsers', function () {
    for ($i = 0; $i < 500; $i++) {
        factory(App\User::class)->create();
    }
})->describe('Populates the Users table with 500 test users.');

Artisan::command('createTestProjects', function () {
    for ($i = 0; $i < 500; $i++) {
        factory(App\Project::class)->create();
    }
})->describe('Populates the Projects table with 500 test users.');