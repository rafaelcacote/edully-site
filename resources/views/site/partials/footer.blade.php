@php
    $contactEmail = config('edully.contact.email');

    $footerColumns = [
        'Plataforma' => [
            '#funcionalidades' => 'Funcionalidades',
            '#aplicativo' => 'Aplicativo',
            '#planos' => 'Planos e preço',
            '#perguntas' => 'Perguntas frequentes',
        ],
        'Para a escola' => [
            '#para-quem' => 'Para quem é',
            '#contato' => 'Agendar demonstração',
        ],
    ];
@endphp

<footer class="border-t border-ink-200 bg-white">
    <div class="shell py-14">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr]">
            <div>
                <img src="/images/logo.svg" alt="Edully" class="h-9 w-auto">
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-ink-500">
                    Agenda digital online da escola: a informação do aluno chega
                    no celular do pai — sem depender do WhatsApp.
                </p>
            </div>

            @foreach ($footerColumns as $title => $links)
                <div>
                    <h2 class="text-xs font-semibold tracking-wide text-ink-400 uppercase">{{ $title }}</h2>
                    <ul class="mt-4 space-y-2.5">
                        @foreach ($links as $href => $label)
                            <li>
                                <a href="{{ $href }}" class="text-sm text-ink-600 transition-colors hover:text-brand-700">{{ $label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div>
                <h2 class="text-xs font-semibold tracking-wide text-ink-400 uppercase">Acesso e contato</h2>
                <ul class="mt-4 space-y-2.5">
                    <li>
                        <a href="{{ config('edully.login_url') }}" class="text-sm text-ink-600 transition-colors hover:text-brand-700">Entrar na plataforma</a>
                    </li>
                    @if ($contactEmail)
                        <li>
                            <a href="mailto:{{ $contactEmail }}" class="text-sm text-ink-600 transition-colors hover:text-brand-700">{{ $contactEmail }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-3 border-t border-ink-200 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs text-ink-400">© {{ now()->year }} Edully. Todos os direitos reservados.</p>
            <p class="text-xs text-ink-400">Feito no Brasil, para escolas brasileiras.</p>
        </div>
    </div>
</footer>
