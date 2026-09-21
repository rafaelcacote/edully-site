@php
    $problems = [
        [
            'title' => 'O aviso mora no grupo do WhatsApp',
            'body' => 'A escola manda no grupo, o recado some no meio das conversas, metade dos pais não vê e ninguém sabe quem leu. A comunicação da escola vira sorte.',
        ],
        [
            'title' => 'A agenda de papel não acompanha o ritmo',
            'body' => 'Prova, lição, nota e comunicado dependem do caderno voltar para casa. O pai só fica sabendo quando já era para ter agido.',
        ],
        [
            'title' => 'A secretaria virou call center',
            'body' => 'O telefone não para: nota do filho, data da prova, qual é a lição. Tempo da equipe consumido respondendo o que deveria estar na agenda do celular.',
        ],
        [
            'title' => 'A informação do aluno está espalhada',
            'body' => 'Notas numa planilha, recado no mural, prova no grupo. Não existe um lugar único onde o pai acompanha tudo o que acontece com o filho na escola.',
        ],
    ];
@endphp

<section class="section bg-ink-900">
    <div class="shell">
        <div class="reveal max-w-2xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs font-semibold tracking-wide text-action-300 uppercase">
                O dia a dia hoje
            </span>
            <h2 class="h2 mt-6 text-white">Soa familiar?</h2>
            <p class="lead mt-4 text-ink-300">
                Não é falta de esforço da equipe. É falta de uma agenda digital online —
                onde a escola registra uma vez e a informação chega no celular do pai.
            </p>
        </div>

        <div class="mt-12 grid gap-4 sm:grid-cols-2">
            @foreach ($problems as $index => $problem)
                <div class="reveal rounded-2xl border border-white/10 bg-white/[0.04] p-6 transition-colors hover:border-white/20" style="transition-delay: {{ $index * 70 }}ms">
                    <div class="flex items-start gap-4">
                        <span class="grid size-9 shrink-0 place-items-center rounded-xl bg-action-500/15 text-action-300" aria-hidden="true">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M12 9v4m0 4h.01M10.3 3.9 2.4 17.5A2 2 0 0 0 4.1 20.5h15.8a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <div>
                            <h3 class="text-base font-semibold text-white">{{ $problem['title'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-ink-300">{{ $problem['body'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
