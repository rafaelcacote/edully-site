@php
    $audiences = [
        [
            'title' => 'Escola que depende do WhatsApp para falar com o pai',
            'body' => 'Grupo lotado, recado perdido e ninguém sabe quem leu. O Edully é a agenda digital online com as ferramentas certas para a informação chegar no celular do responsável.',
            'highlight' => 'Ganho principal',
            'result' => 'Comunicado que chega — com confirmação de leitura',
            'tile' => 'bg-gradient-to-br from-action-400 to-action-600',
            'icon' => 'M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z',
        ],
        [
            'title' => 'Escola que ainda vive na agenda de papel',
            'body' => 'Diário manual, boletim digitado à mão e recado no caderno. O ganho é imediato: a escola registra uma vez e o pai acompanha tudo no celular.',
            'highlight' => 'Ganho principal',
            'result' => 'Agenda online no lugar do caderno e da planilha',
            'tile' => 'bg-gradient-to-br from-brand-400 to-brand-600',
            'icon' => 'M8 4h8a2 2 0 0 1 2 2v14l-6-3-6 3V6a2 2 0 0 1 2-2Z',
        ],
        [
            'title' => 'Rede ou grupo com várias unidades',
            'body' => 'Cada unidade opera com autonomia e dados separados, enquanto a administração da rede acompanha tudo de um lugar só, com planos por escola.',
            'highlight' => 'Ganho principal',
            'result' => 'Padronização da rede sem misturar dados',
            'tile' => 'bg-gradient-to-br from-grow-400 to-grow-600',
            'icon' => 'M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6',
        ],
    ];
@endphp

<section id="para-quem" class="section bg-ink-50/70">
    <div class="shell">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="eyebrow">Para quem é</span>
            <h2 class="h2 mt-6">Onde a agenda digital faz mais diferença</h2>
            <p class="lead mt-4">
                Da escola de bairro à rede com várias unidades — o Edully mantém o pai
                informado sobre o aluno, com o que a escola precisa para a informação chegar.
            </p>
        </div>

        <div class="mt-14 grid gap-5 lg:grid-cols-3">
            @foreach ($audiences as $index => $audience)
                <article class="reveal card-hover flex flex-col" style="transition-delay: {{ $index * 80 }}ms">
                    <span class="icon-tile {{ $audience['tile'] }}" aria-hidden="true">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="{{ $audience['icon'] }}" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <h3 class="h3">{{ $audience['title'] }}</h3>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-ink-500">{{ $audience['body'] }}</p>

                    <div class="mt-5 rounded-xl bg-ink-50 p-4">
                        <p class="text-[10px] font-semibold tracking-wide text-ink-400 uppercase">{{ $audience['highlight'] }}</p>
                        <p class="mt-1 text-sm font-semibold text-ink-800">{{ $audience['result'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
