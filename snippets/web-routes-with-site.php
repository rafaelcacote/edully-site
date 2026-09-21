<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Site\LandingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

$siteDomain = config('edully.domains.site');
$appDomain = config('edully.domains.app');

/*
| Com os dois domínios configurados, o site de vendas atende apenas o domínio
| institucional e a aplicação apenas o domínio do app. Quando as variáveis não
| estão definidas, Route::domain(null) não impõe restrição e tudo continua
| respondendo no mesmo host — comportamento de desenvolvimento e de testes.
*/
$domainsAreSplit = $siteDomain !== null && $appDomain !== null && $siteDomain !== $appDomain;

Route::domain($siteDomain)->group(function () use ($domainsAreSplit) {
    Route::get('/', [LandingController::class, 'index'])->name('home');

    Route::post('contato', [LandingController::class, 'storeLead'])
        ->middleware('throttle:6,1')
        ->name('site.leads.store');

    // Quem digita o /login do domínio institucional cai no domínio da aplicação.
    if ($domainsAreSplit) {
        Route::get('login', fn () => redirect()->route('login'))->name('site.login');
    }
});

Route::domain($appDomain)->group(function () use ($domainsAreSplit) {
    // A raiz do domínio da aplicação não exibe o site de vendas.
    if ($domainsAreSplit) {
        Route::get('/', function () {
            return auth()->check()
                ? redirect()->route('dashboard')
                : redirect()->route('login');
        })->name('app.home');
    }

    // Rota temporária para limpar sessão e fazer logout forçado
    Route::get('/force-logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('force-logout');

    Route::get('/welcome', function () {
        return Inertia::render('Welcome', [
            'canRegister' => Features::enabled(Features::registration()),
        ]);
    })->middleware('guest')->name('welcome');

    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // Rota pública para buscar escolas por CPF (antes do login)
    Route::get('api/auth/tenants-by-cpf', [\App\Http\Controllers\Auth\TenantController::class, 'getByCpf'])
        ->name('api.auth.tenants-by-cpf');

    require __DIR__.'/settings.php';
    require __DIR__.'/users.php';
    require __DIR__.'/tenants.php';
    require __DIR__.'/roles.php';
    require __DIR__.'/permissions.php';
    require __DIR__.'/plans.php';
    require __DIR__.'/subscriptions.php';
    require __DIR__.'/audit-logs.php';
    require __DIR__.'/school.php';
});
