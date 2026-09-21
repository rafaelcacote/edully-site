@php
    $features = [
        [
            'title' => 'Cadastro de pessoas',
            'tile' => 'bg-gradient-to-br from-brand-400 to-brand-600',
            'icon' => 'M16 19a4 4 0 0 0-8 0M12 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7 8a3 3 0 0 0-3-3m-8 0a3 3 0 0 0-3 3M18 11a2 2 0 1 0 0-4m-12 4a2 2 0 1 1 0-4',
            'body' => 'Alunos, responsáveis e professores em um cadastro único, com validação de CPF e e-mail e busca rápida.',
            'items' => ['Alunos com rematrícula', 'Responsáveis com parentesco', 'Vínculo responsável ↔ aluno', 'Professores e suas disciplinas'],
        ],
        [
            'title' => 'Estrutura acadêmica',
            'tile' => 'bg-gradient-to-br from-brand-500 to-brand-800',
            'icon' => 'M4 6h16M4 12h16M4 18h10M3 4v16',
            'body' => 'Monte o ano letivo com turmas, disciplinas e matrículas, e veja a lista de alunos de cada turma a qualquer momento.',
            'items' => ['Turmas com status ativo/inativo', 'Disciplinas por turma', 'Matrícula em turma', 'Lista de alunos por turma'],
        ],
        [
            'title' => 'Notas e boletins',
            'tile' => 'bg-gradient-to-br from-grow-400 to-grow-600',
            'icon' => 'M9 11H5v9h4v-9Zm5-6h-4v15h4V5Zm5 9h-4v6h4v-6Z',
            'body' => 'Lançamento por bimestre com modo em lote: a turma inteira em uma tela só, sem digitar aluno por aluno.',
            'items' => ['Lançamento em lote por turma', 'Notas por bimestre', 'Boletim por aluno', 'Boletim consolidado da turma'],
        ],
        [
            'title' => 'Provas e exercícios',
            'tile' => 'bg-gradient-to-br from-sun-400 to-action-500',
            'icon' => 'M8 4h8a2 2 0 0 1 2 2v14l-6-3-6 3V6a2 2 0 0 1 2-2Zm1 5h6m-6 4h4',
            'body' => 'O professor publica a avaliação com todos os detalhes e a família fica sabendo antes da data, não depois.',
            'items' => ['Provas com data, hora, sala e duração', 'Exercícios com prazo de entrega', 'Anexos de arquivos', 'Organização por bimestre'],
        ],
        [
            'title' => 'Comunicação com as famílias',
            'tile' => 'bg-gradient-to-br from-action-400 to-action-600',
            'icon' => 'M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z',
            'body' => 'Em vez do grupo de WhatsApp: recados e comunicados na agenda digital, com notificação e controle de quem leu.',
            'items' => ['Recados com prioridade e anexo', 'Comunicados com público-alvo', 'Publicação e expiração programadas', 'Confirmação de leitura'],
        ],
        [
            'title' => 'Aplicativo para celular',
            'tile' => 'bg-gradient-to-br from-brand-400 to-grow-500',
            'icon' => 'M7 3h10a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm3 15h4',
            'body' => 'A agenda da escola no bolso do pai. O que acontece com o aluno aparece no celular, com notificação push.',
            'items' => ['Notificação push automática', 'Notas e boletim do filho', 'Professores da turma', 'Mensagens direto do app'],
        ],
        [
            'title' => 'Segurança e controle de acesso',
            'tile' => 'bg-gradient-to-br from-ink-600 to-ink-900',
            'icon' => 'M12 2 4 6v6c0 5 3.4 8.6 8 10 4.6-1.4 8-5 8-10V6l-8-4Zm-2 9 2 2 4-4',
            'body' => 'Cada pessoa vê apenas o que lhe cabe. Papéis prontos para diretoria, secretaria, professor e responsável.',
            'items' => ['Perfis e permissões granulares', 'Autenticação em dois fatores', 'Log de auditoria das ações', 'Login por CPF'],
        ],
        [
            'title' => 'Gestão de rede multi-escola',
            'tile' => 'bg-gradient-to-br from-brand-600 to-brand-900',
            'icon' => 'M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6',
            'body' => 'Administre várias escolas na mesma plataforma, com dados separados e visão consolidada da rede.',
            'items' => ['Uma conta, várias escolas', 'Troca de escola no login', 'Planos e assinaturas por escola', 'Painel da rede'],
        ],
    ];
@endphp

<section id="funcionalidades" class="section bg-ink-50/70">
    <div class="shell">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="eyebrow">Funcionalidades</span>
            <h2 class="h2 mt-6">Tudo que a agenda digital precisa</h2>
            <p class="lead mt-4">
                Do cadastro do aluno ao comunicado no celular do pai — a escola registra
                uma vez e a família acompanha no app, com as ferramentas mais avançadas
                para a informação chegar de verdade.
            </p>
        </div>

        <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($features as $index => $feature)
                <article class="reveal card-hover flex flex-col" style="transition-delay: {{ ($index % 4) * 70 }}ms">
                    <span class="icon-tile {{ $feature['tile'] }}" aria-hidden="true">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="{{ $feature['icon'] }}" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <h3 class="h3">{{ $feature['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-ink-500">{{ $feature['body'] }}</p>

                    <ul class="mt-4 space-y-1.5 border-t border-ink-200/80 pt-4">
                        @foreach ($feature['items'] as $item)
                            <li class="flex items-start gap-2 text-[13px] leading-snug text-ink-600">
                                <span class="mt-1.5 size-1.5 shrink-0 rounded-full bg-brand-300" aria-hidden="true"></span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>
