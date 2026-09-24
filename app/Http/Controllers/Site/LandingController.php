<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreLeadRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

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
        $lead = Lead::create([
            ...$request->safe()->except('consentimento'),
            'origem' => 'landing',
            'status' => 'novo',
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $this->notifyTeamAboutLead($lead);

        return redirect()
            ->to(route('home').'#contato')
            ->with('lead_enviado', true);
    }

    /**
     * Avisa a equipe comercial por e-mail. Falha no SMTP não impede o cadastro.
     */
    private function notifyTeamAboutLead(Lead $lead): void
    {
        $to = config('edully.contact.notify_email');

        if (! filled($to)) {
            return;
        }

        try {
            Mail::to($to)->send(new LeadReceived($lead));
        } catch (Throwable $exception) {
            Log::error('Falha ao enviar e-mail de novo lead.', [
                'lead_id' => $lead->id,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
