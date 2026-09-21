<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Display the public sales page.
     */
    public function index(): View
    {
        return view('site.home', [
            'pricing' => config('edully.pricing'),
            'contact' => config('edully.contact'),
        ]);
    }

    /**
     * Store a demonstration request coming from the sales page.
     */
    public function storeLead(StoreLeadRequest $request): RedirectResponse
    {
        Lead::create([
            ...$request->safe()->except('consentimento'),
            'origem' => 'landing',
            'status' => 'novo',
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()
            ->to(route('home').'#contato')
            ->with('lead_enviado', true);
    }
}
