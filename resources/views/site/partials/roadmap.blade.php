@php
    $roadmap = [
        [
            'title' => 'Módulo financeiro da escola',
            'body' => 'Mensalidades, eventos cobráveis e controle de cobranças por aluno, com a base de dados já modelada na plataforma.',
        ],
        [
            'title' => 'Boleto e PIX para as famílias',
            'body' => 'Geração de cobrança para o responsável pagar direto pelo aplicativo, com baixa automática.',
        ],
        [
            'title' => 'Boletim em PDF e relatórios',
            'body' => 'Exportação do boletim para impressão e assinatura, além de relatórios gerenciais em PDF e planilha.',
        ],
    ];
@endphp

<section class="section pt-0">
    <div class="shell">
        <div class="reveal rounded-3xl border border-ink-200 bg-ink-50/70 p-7 sm:p-10">
            <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-14">
                <div>
                    <span class="eyebrow">Em desenvolvimento</span>
                    <h2 class="h2 mt-5 text-3xl sm:text-3xl">O que vem a seguir</h2>
                    <p class="mt-4 text-sm leading-relaxed text-ink-500">
                        Preferimos ser transparentes sobre o que ainda não está pronto. Estes itens
                        estão em construção e entram para todas as escolas sem custo adicional,
                        porque o preço por aluno já inclui as atualizações.
                    </p>
                </div>

                <div class="space-y-4">
                    @foreach ($roadmap as $item)
                        <div class="flex items-start gap-4 rounded-2xl border border-ink-200 bg-white p-5">
                            <span class="mt-0.5 grid size-8 shrink-0 place-items-center rounded-lg bg-sun-100 text-action-600" aria-hidden="true">
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 8v4l3 2m-3 8a10 10 0 1 1 0-20 10 10 0 0 1 0 20Z" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-sm font-semibold text-ink-900">{{ $item['title'] }}</h3>
                                <p class="mt-1.5 text-sm leading-relaxed text-ink-500">{{ $item['body'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
