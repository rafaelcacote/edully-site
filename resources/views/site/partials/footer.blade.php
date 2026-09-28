@php
    $contactEmail = config('edully.contact.email');
    $whatsappDigits = preg_replace('/\D+/', '', (string) config('edully.contact.whatsapp'));
    $whatsappLabel = preg_match('/^55(\d{2})(\d{5})(\d{4})$/', $whatsappDigits, $parts)
        ? "({$parts[1]}) {$parts[2]}-{$parts[3]}"
        : $whatsappDigits;
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
                @if ($instagramUrl || $whatsappDigits !== '')
                    <div class="mt-5 flex items-center gap-2">
                        @if ($instagramUrl)
                            <a
                                href="{{ $instagramUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex size-10 items-center justify-center rounded-full border border-ink-200 text-ink-600 transition-colors hover:border-brand-300 hover:text-brand-700"
                                aria-label="Instagram da Edully"
                            >
                                <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85C2.38 3.92 3.9 2.38 7.15 2.23 8.42 2.17 8.8 2.16 12 2.16ZM12 0C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.62 6.78 6.98 6.98C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95C23.73 2.69 21.31.27 16.95.07 15.67.01 15.26 0 12 0Zm0 5.84a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32ZM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm6.41-10.85a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88Z"/>
                                </svg>
                            </a>
                        @endif
                        @if ($whatsappDigits !== '')
                            <a
                                href="https://wa.me/{{ $whatsappDigits }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex size-10 items-center justify-center rounded-full border border-ink-200 text-ink-600 transition-colors hover:border-brand-300 hover:text-brand-700"
                                aria-label="WhatsApp da Edully, {{ $whatsappLabel }}"
                                title="{{ $whatsappLabel }}"
                            >
                                <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                                </svg>
                            </a>
                        @endif
                    </div>
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
                    @if ($whatsappDigits !== '')
                        <li>
                            <a
                                href="https://wa.me/{{ $whatsappDigits }}"
                                class="text-sm text-ink-600 transition-colors hover:text-brand-700"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                WhatsApp {{ $whatsappLabel }}
                            </a>
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
