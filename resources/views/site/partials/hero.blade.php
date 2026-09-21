@php
    $trustItems = [
        ['label' => 'Login por CPF', 'icon' => 'M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm0 2c-4 0-7 2-7 4v2h14v-2c0-2-3-4-7-4Z'],
        ['label' => '2FA e log de auditoria', 'icon' => 'M12 2 4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4Z'],
        ['label' => '100% em português', 'icon' => 'M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20ZM2 12h20M12 2c3 3 3 17 0 20M12 2c-3 3-3 17 0 20'],
    ];
@endphp

<section class="relative overflow-hidden">
    <div class="mesh absolute inset-0 -z-20" aria-hidden="true"></div>
    <div class="grid-lines absolute inset-0 -z-10" aria-hidden="true"></div>

    <div class="shell pt-16 pb-20 sm:pt-24 sm:pb-28">
        <div class="flex flex-col items-center gap-10 md:flex-row md:items-center md:gap-12 lg:gap-16">
            <div class="reveal w-full min-w-0 flex-1">
                <span class="eyebrow">
                    <span class="size-1.5 rounded-full bg-grow-500"></span>
                    Agenda digital online
                </span>

                <h1 class="h1 mt-6">
                    A agenda da escola.<br>
                    <span class="text-gradient">No celular do pai.</span>
                </h1>

                <p class="lead mt-6 max-w-xl">
                    Se a sua escola ainda depende do WhatsApp para avisar a família, o Edully é a
                    agenda digital online com o que há de mais avançado para a informação do aluno
                    chegar de verdade no celular do responsável — notas, provas, comunicados e o
                    dia a dia da escola, com notificação.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="#contato" class="btn-primary px-6 py-3.5 text-base">
                        Agendar demonstração
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="#planos" class="btn-secondary px-6 py-3.5 text-base">Ver preço por aluno</a>
                </div>

                <div class="mt-6 flex flex-wrap items-center gap-3" aria-label="Disponibilidade do aplicativo">
                    <span class="inline-flex items-center gap-2.5 rounded-xl border border-ink-200 bg-white/80 px-3.5 py-2.5 text-sm font-semibold text-ink-800 shadow-soft backdrop-blur-sm">
                        <svg class="size-5 shrink-0 text-[#3DDC84]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.6 9.48 19.44 6.3a.63.63 0 0 0-1.09-.63l-1.88 3.26A11.3 11.3 0 0 0 12 8.5c-1.56 0-3.04.35-4.47 1.01L5.65 5.67a.63.63 0 1 0-1.09.63l1.84 3.18A10.4 10.4 0 0 0 1.5 17.25h21a10.4 10.4 0 0 0-4.9-7.77ZM7.75 15a1.13 1.13 0 1 1 0-2.25 1.13 1.13 0 0 1 0 2.25Zm8.5 0a1.13 1.13 0 1 1 0-2.25 1.13 1.13 0 0 1 0 2.25Z"/>
                        </svg>
                        <span class="leading-tight">
                            App para Android
                            <span class="mt-0.5 block text-xs font-medium text-grow-600">Disponível</span>
                        </span>
                    </span>

                    <span class="inline-flex items-center gap-2.5 rounded-xl border border-ink-200 bg-white/80 px-3.5 py-2.5 text-sm font-semibold text-ink-800 shadow-soft backdrop-blur-sm">
                        <svg class="size-5 shrink-0 text-ink-700" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M16.37 12.63c.03-2.4 1.96-3.55 2.05-3.61-1.12-1.64-2.86-1.86-3.48-1.88-1.48-.15-2.89.87-3.64.87-.75 0-1.91-.85-3.14-.83-1.61.02-3.1.94-3.93 2.38-1.68 2.91-.43 7.22 1.2 9.58.8 1.16 1.75 2.45 3 2.4 1.2-.05 1.66-.78 3.11-.78s1.86.78 3.14.75c1.3-.02 2.12-1.18 2.91-2.34.92-1.34 1.3-2.64 1.32-2.71-.03-.01-2.53-.97-2.54-3.83ZM14.6 5.48c.66-.8 1.1-1.91.98-3.02-1.05.06-2.33.72-3.08 1.61-.67.78-1.26 2.03-1.1 3.11 1.16.09 2.35-.59 3.2-1.7Z"/>
                        </svg>
                        <span class="leading-tight">
                            App para iOS
                            <span class="mt-0.5 block text-xs font-medium text-brand-600">Em breve</span>
                        </span>
                    </span>
                </div>

                <p class="mt-5 text-sm text-ink-500">
                    <strong class="font-semibold text-ink-800">R$ {{ number_format((float) $pricing['price_per_student'], 2, ',', '.') }} por aluno / mês.</strong>
                    Sem cobrança mínima. Professores e responsáveis não são cobrados.
                </p>

                <ul class="mt-10 grid gap-3 border-t border-ink-200/80 pt-8 sm:grid-cols-2">
                    @foreach ($trustItems as $item)
                        <li class="flex items-center gap-2.5 text-sm font-medium text-ink-600">
                            <svg class="size-4 shrink-0 text-brand-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="{{ $item['icon'] }}" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ $item['label'] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal relative w-[250px] shrink-0 sm:w-[280px] md:w-[310px] lg:w-[340px]" style="transition-delay: 120ms">
                <div class="hero-phone-glow animate-logo-glow pointer-events-none absolute inset-[-18%] -z-10" aria-hidden="true">
                    <span class="absolute top-[8%] left-[12%] size-[58%] rounded-full bg-brand-400/45 blur-3xl"></span>
                    <span class="absolute top-[28%] right-[4%] size-[48%] rounded-full bg-action-400/40 blur-3xl"></span>
                    <span class="absolute bottom-[10%] left-[18%] size-[52%] rounded-full bg-grow-400/40 blur-3xl"></span>
                    <span class="absolute right-[18%] bottom-[22%] size-[36%] rounded-full bg-sun-400/35 blur-2xl"></span>
                </div>

                <div class="animate-float overflow-hidden rounded-[1.85rem] border-[8px] border-ink-900 bg-ink-900 shadow-lift sm:rounded-[2rem] sm:border-[10px]">
                    <img
                        src="/imagens_app/tela_principal.png"
                        alt="Tela principal do aplicativo Edully no celular"
                        class="block h-auto w-full"
                        loading="eager"
                        decoding="async"
                    >
                </div>
            </div>
        </div>
    </div>
</section>
