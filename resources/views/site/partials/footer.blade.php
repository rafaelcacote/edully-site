@php
    $contactEmail = config('edully.contact.email');
    $instagram = config('edully.contact.instagram');
    $instagramUrl = filled($instagram)
        ? (str_starts_with((string) $instagram, 'http')
            ? $instagram
            : 'https://www.instagram.com/'.ltrim((string) $instagram, '@'))
        : null;

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
                @if ($instagramUrl)
                    <a
                        href="{{ $instagramUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-5 inline-flex size-10 items-center justify-center rounded-full border border-ink-200 text-ink-600 transition-colors hover:border-brand-300 hover:text-brand-700"
                        aria-label="Instagram da Edully"
                    >
                        <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85C2.38 3.92 3.9 2.38 7.15 2.23 8.42 2.17 8.8 2.16 12 2.16ZM12 0C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.62 6.78 6.98 6.98C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95C23.73 2.69 21.31.27 16.95.07 15.67.01 15.26 0 12 0Zm0 5.84a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32ZM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm6.41-10.85a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88Z"/>
                        </svg>
                    </a>
                @endif
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
