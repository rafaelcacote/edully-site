<?php

use App\Http\Controllers\Site\LandingController;
use Illuminate\Support\Facades\Route;

$siteDomain = config('edully.domains.site');

/*
| Com EDULLY_SITE_DOMAIN definido, a landing responde só nesse host.
| Em desenvolvimento (variável vazia), Route::domain(null) não restringe.
*/
Route::domain($siteDomain)->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('home');

    Route::post('contato', [LandingController::class, 'storeLead'])
        ->middleware('throttle:6,1')
        ->name('site.leads.store');
});
