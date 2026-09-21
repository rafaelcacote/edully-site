@php
    $pricePerStudent = (float) $pricing['price_per_student'];
    $priceLabel = 'R$ '.number_format($pricePerStudent, 2, ',', '.');
    $exampleMonthly = 'R$ '.number_format(300 * $pricePerStudent, 2, ',', '.');

    $faq = [
        [
            'q' => 'O Edully substitui o grupo de WhatsApp da escola?',
            'a' => 'Sim, para o que importa na relação escola–família. Em vez de avisos perdidos no meio da conversa, a escola publica na agenda digital e o responsável recebe no celular, com notificação e confirmação de leitura.',
        ],
        [
            'q' => 'O que o pai vê na agenda digital?',
            'a' => 'Notas, boletim, provas, exercícios, comunicados e recados dos filhos — tudo organizado no aplicativo, com login por CPF. A proposta é manter o responsável informado sobre o aluno e sobre o que acontece na escola.',
        ],
        [
            'q' => "Como funciona a cobrança de {$priceLabel} por aluno?",
            'a' => "O valor é por aluno ativo, por mês. Uma escola com 300 alunos investe {$exampleMonthly} por mês pela plataforma completa. Se a escola cresce ou reduz, o valor acompanha.",
        ],
        [
            'q' => 'Preciso pagar por professor, por secretaria ou por responsável?',
            'a' => 'Não. Só o aluno entra na conta. Você pode cadastrar quantos professores, coordenadores e responsáveis quiser, e todos eles usam o painel e o aplicativo sem custo adicional.',
        ],
        [
            'q' => 'Existe cobrança mínima ou taxa de adesão?',
            'a' => 'Não há cobrança mínima. Uma escola pequena paga exatamente pelo número de alunos que tem. Condições de implantação são tratadas caso a caso na demonstração.',
        ],
        [
            'q' => 'Como funciona o desconto anual?',
            'a' => 'No ciclo anual você paga 10 meses e usa a plataforma pelos 12 — ou seja, dois meses livres. A calculadora acima mostra o valor exato para o número de alunos da sua escola.',
        ],
        [
            'q' => 'Os dados da minha escola ficam separados das outras?',
            'a' => 'Sim. Cada escola opera em um ambiente próprio e toda consulta é restrita à escola do usuário. Um usuário que trabalha em duas escolas escolhe qual quer acessar no momento do login.',
        ],
        [
            'q' => 'Os responsáveis precisam de celular novo para usar o app?',
            'a' => 'Não. O aplicativo já está disponível para Android, e a versão para iOS chega em breve. O responsável entra com o próprio CPF, e todas as informações também podem ser consultadas pelo navegador quando necessário.',
        ],
        [
            'q' => 'Como a plataforma trata a segurança e a privacidade dos dados?',
            'a' => 'O acesso é controlado por perfis com permissões específicas, há autenticação em dois fatores para quem precisa e todas as ações relevantes ficam registradas em log de auditoria — o que ajuda a escola a demonstrar conformidade quando questionada.',
        ],
        [
            'q' => 'E os dados que já tenho em planilha? E o treinamento da equipe?',
            'a' => 'Traga sua planilha para a demonstração: avaliamos o formato junto com você e combinamos o plano de carga inicial e de treinamento da equipe antes de a escola entrar no ar.',
        ],
    ];
@endphp

<section id="perguntas" class="section bg-ink-50/70">
    <div class="shell">
        <div class="grid gap-10 lg:grid-cols-[0.75fr_1.25fr] lg:gap-16">
            <div class="reveal">
                <span class="eyebrow">Perguntas frequentes</span>
                <h2 class="h2 mt-5">Antes que você pergunte</h2>
                <p class="mt-4 text-sm leading-relaxed text-ink-500">
                    Ficou alguma dúvida fora da lista? Traga na demonstração — a conversa é
                    com quem conhece o produto, não com um roteiro de vendas.
                </p>
                <a href="#contato" class="btn-brand mt-6">Falar com a gente</a>
            </div>

            <div class="reveal space-y-3" style="transition-delay: 90ms">
                @foreach ($faq as $item)
                    <details class="faq-item group rounded-2xl border border-ink-200 bg-white px-5 py-4 transition-colors open:border-brand-200">
                        <summary class="flex cursor-pointer items-center justify-between gap-4 text-sm font-semibold text-ink-900 marker:content-none">
                            {{ $item['q'] }}
                            <svg class="faq-chevron size-4 shrink-0 text-ink-400 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                                <path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </summary>
                        <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $item['a'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
