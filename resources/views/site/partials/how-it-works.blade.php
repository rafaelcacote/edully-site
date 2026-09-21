@php
    $steps = [
        [
            'title' => 'A escola entra com a própria agenda',
            'body' => 'Criamos o ambiente da escola na plataforma. A equipe passa a registrar notas, provas e comunicados no mesmo lugar — a agenda digital da escola.',
            'items' => ['Ambiente próprio da escola', 'Equipe com permissões', 'Dados isolados por escola'],
        ],
        [
            'title' => 'Você organiza o ano letivo',
            'body' => 'Turmas, disciplinas, professores e matrículas. Cada aluno fica vinculado aos responsáveis — a base da agenda que o pai vai acompanhar no celular.',
            'items' => ['Turmas e disciplinas', 'Professor por disciplina e turma', 'Aluno vinculado ao responsável'],
        ],
        [
            'title' => 'O pai recebe no celular',
            'body' => 'O responsável baixa o app, entra com o CPF e passa a acompanhar notas, boletim, provas, exercícios e comunicados — com notificação a cada novidade.',
            'items' => ['Acesso por CPF', 'Notificação push automática', 'Um app para todos os filhos'],
        ],
    ];
@endphp

<section class="section">
    <div class="shell">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="eyebrow">Como funciona</span>
            <h2 class="h2 mt-6">Três passos para sair do WhatsApp</h2>
            <p class="lead mt-4">
                Sem projeto de seis meses. A escola passa a ter uma agenda digital online
                e as famílias começam a receber a informação na mesma semana.
            </p>
        </div>

        <ol class="mt-14 grid gap-6 lg:grid-cols-3">
            @foreach ($steps as $index => $step)
                <li class="reveal card-hover relative" style="transition-delay: {{ $index * 90 }}ms">
                    <span class="absolute -top-4 left-6 grid size-9 place-items-center rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-sm font-bold text-white shadow-glow">
                        {{ $index + 1 }}
                    </span>

                    <h3 class="h3 mt-5">{{ $step['title'] }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $step['body'] }}</p>

                    <ul class="mt-5 space-y-2 border-t border-ink-200/80 pt-5">
                        @foreach ($step['items'] as $item)
                            <li class="flex items-start gap-2 text-sm text-ink-600">
                                <svg class="mt-0.5 size-4 shrink-0 text-grow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                                    <path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ol>
    </div>
</section>
