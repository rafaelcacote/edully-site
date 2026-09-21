@php
    $spotlights = [
        [
            'eyebrow' => 'Notas e boletins',
            'title' => 'O bimestre fecha em uma tela, não em uma semana',
            'body' => 'O professor escolhe turma, disciplina e bimestre e digita a turma inteira de uma vez. O boletim se monta sozinho — sem redigitação na secretaria e sem divergência entre a planilha e o sistema.',
            'items' => [
                'Lançamento em lote com a turma completa na tela',
                'Boletim gerado automaticamente por aluno e por turma',
                'Notas organizadas por bimestre e disciplina',
                'A família vê a nota no app assim que é salva',
            ],
            'mockup' => 'site.partials.mockups.notas-lote',
            'flip' => false,
        ],
        [
            'eyebrow' => 'Comunicação',
            'title' => 'Mais avançado que o WhatsApp: chega — e você sabe quem leu',
            'body' => 'Escolha o público, defina prioridade, anexe o arquivo e programe a publicação. O responsável recebe na agenda do celular, e você acompanha a confirmação de leitura em vez de torcer para o recado ter aparecido no grupo.',
            'items' => [
                'Comunicados por escola, turma ou público específico',
                'Notificação push automática no celular da família',
                'Recados individuais em formato de conversa',
                'Prioridade, anexos, data de publicação e expiração',
            ],
            'mockup' => 'site.partials.mockups.comunicado',
            'flip' => true,
        ],
        [
            'eyebrow' => 'Rede e segurança',
            'title' => 'Várias escolas, uma plataforma, dados separados',
            'body' => 'Cada escola opera no seu próprio ambiente, com dados isolados. Quem administra a rede tem visão do conjunto; quem trabalha em uma escola só vê o que é dela. Toda ação importante fica registrada.',
            'items' => [
                'Isolamento de dados por escola',
                'Perfis prontos para diretoria, secretaria, professor e responsável',
                'Autenticação em dois fatores e login por CPF',
                'Log de auditoria de quem fez o quê',
            ],
            'mockup' => 'site.partials.mockups.escolas',
            'flip' => false,
        ],
    ];
@endphp

<section class="section">
    <div class="shell space-y-24 sm:space-y-32">
        @foreach ($spotlights as $spotlight)
            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div @class(['reveal', 'lg:order-2' => $spotlight['flip']])>
                    <span class="eyebrow">{{ $spotlight['eyebrow'] }}</span>
                    <h2 class="h2 mt-5">{{ $spotlight['title'] }}</h2>
                    <p class="mt-5 text-base leading-relaxed text-ink-500 sm:text-lg">{{ $spotlight['body'] }}</p>

                    <ul class="mt-7 space-y-3">
                        @foreach ($spotlight['items'] as $item)
                            <li class="flex items-start gap-3 text-sm text-ink-700 sm:text-base">
                                <span class="mt-0.5 grid size-5 shrink-0 place-items-center rounded-full bg-grow-50 text-grow-600" aria-hidden="true">
                                    <svg class="size-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div @class(['reveal', 'lg:order-1' => $spotlight['flip']]) style="transition-delay: 110ms">
                    @include($spotlight['mockup'])
                </div>
            </div>
        @endforeach
    </div>
</section>
