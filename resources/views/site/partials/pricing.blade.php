@php
    $pricePerStudent = (float) $pricing['price_per_student'];
    $billedMonths = (int) $pricing['annual_billed_months'];
    $defaultStudents = (int) $pricing['default_students'];

    $included = [
        'Todos os módulos, sem pacote premium',
        'Usuários ilimitados para professores e responsáveis',
        'Aplicativo Android incluído (iOS em breve)',
        'Notificações push ilimitadas',
        'Armazenamento de anexos de provas e comunicados',
        'Atualizações e novos recursos incluídos',
        'Autenticação em dois fatores e log de auditoria',
        'Suporte em português',
    ];
@endphp

<section id="planos" class="section">
    <div class="shell">
        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="eyebrow">Planos</span>
            <h2 class="h2 mt-6">Um preço só, por aluno</h2>
            <p class="lead mt-4">
                Sem pacote básico que não serve e sem plano premium para liberar o que importa.
                Você paga <strong class="font-semibold text-ink-800">{{ 'R$ '.number_format($pricePerStudent, 2, ',', '.') }} por aluno ativo</strong>
                e usa a plataforma inteira.
            </p>
        </div>

        <div class="reveal mt-14 overflow-hidden rounded-3xl border border-ink-200 bg-white shadow-lift">
            <div class="grid lg:grid-cols-[1.05fr_0.95fr]">
                <div class="p-7 sm:p-10">
                    <fieldset>
                        <legend class="sr-only">Ciclo de cobrança</legend>
                        <div class="inline-flex rounded-xl bg-ink-100 p-1">
                            <label class="cursor-pointer">
                                <input type="radio" name="ciclo" value="mensal" data-price-cycle class="peer sr-only" checked>
                                <span class="block rounded-lg px-4 py-2 text-sm font-semibold text-ink-500 transition-colors peer-checked:bg-white peer-checked:text-ink-900 peer-checked:shadow-soft">
                                    Mensal
                                </span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="ciclo" value="anual" data-price-cycle class="peer sr-only">
                                <span class="block rounded-lg px-4 py-2 text-sm font-semibold text-ink-500 transition-colors peer-checked:bg-white peer-checked:text-ink-900 peer-checked:shadow-soft">
                                    Anual
                                    <span class="ml-1 rounded-md bg-grow-50 px-1.5 py-0.5 text-[10px] font-bold text-grow-700">2 meses grátis</span>
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <div class="mt-8">
                        <label for="price-slider" class="text-sm font-semibold text-ink-800">
                            Quantos alunos sua escola tem?
                        </label>
                        <p class="mt-1 text-sm text-ink-500">
                            <span data-price-students class="text-base font-bold text-brand-700">{{ number_format($defaultStudents, 0, ',', '.') }}</span>
                            alunos ativos
                        </p>

                        <input
                            id="price-slider"
                            type="range"
                            class="range mt-4"
                            min="{{ $pricing['min_students'] }}"
                            max="{{ $pricing['max_students'] }}"
                            step="10"
                            value="{{ $defaultStudents }}"
                            data-price-slider
                            aria-describedby="price-slider-hint"
                        >
                        <div id="price-slider-hint" class="mt-2 flex justify-between text-xs text-ink-400">
                            <span>{{ number_format((int) $pricing['min_students'], 0, ',', '.') }}</span>
                            <span>{{ number_format((int) $pricing['max_students'], 0, ',', '.') }}+</span>
                        </div>
                    </div>

                    <div class="mt-8 rounded-2xl bg-gradient-to-br from-brand-50 to-white p-6 ring-1 ring-brand-100">
                        <p class="text-xs font-semibold tracking-wide text-brand-700 uppercase">Investimento da escola</p>
                        <p class="mt-2 flex flex-wrap items-baseline gap-2">
                            <span data-price-total class="text-4xl font-bold tracking-tight text-ink-900">
                                {{ 'R$ '.number_format($defaultStudents * $pricePerStudent, 2, ',', '.') }}
                            </span>
                            <span data-price-period class="text-sm font-semibold text-ink-500">por mês</span>
                        </p>
                        <p data-price-savings class="mt-2 text-sm font-medium text-grow-600">
                            Equivale a {{ 'R$ '.number_format($pricePerStudent, 2, ',', '.') }} por aluno
                        </p>
                        <p class="mt-4 border-t border-brand-100 pt-4 text-xs leading-relaxed text-ink-500">
                            Custo por aluno no ciclo escolhido:
                            <strong data-price-per-student class="font-semibold text-ink-700">{{ 'R$ '.number_format($pricePerStudent, 2, ',', '.') }}</strong>
                            por mês. No ciclo anual você paga {{ $billedMonths }} meses e usa os 12.
                        </p>
                    </div>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="#contato" class="btn-primary px-6 py-3.5 text-base">Agendar demonstração</a>
                        <a href="#perguntas" class="btn-secondary px-6 py-3.5 text-base">Tirar dúvidas</a>
                    </div>

                    <p class="mt-4 text-xs text-ink-400">
                        Valores simulados com base no número de alunos ativos. A proposta final é
                        confirmada na demonstração.
                    </p>
                </div>

                <div class="border-t border-ink-200 bg-ink-50/70 p-7 sm:p-10 lg:border-t-0 lg:border-l">
                    <h3 class="h3">Está tudo incluído</h3>
                    <p class="mt-2 text-sm text-ink-500">
                        Não existe módulo bloqueado nem cobrança por usuário adicional.
                    </p>

                    <ul class="mt-6 space-y-3">
                        @foreach ($included as $item)
                            <li class="flex items-start gap-3 text-sm text-ink-700">
                                <span class="mt-0.5 grid size-5 shrink-0 place-items-center rounded-full bg-grow-500 text-white" aria-hidden="true">
                                    <svg class="size-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2">
                                        <path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8 rounded-xl border border-ink-200 bg-white p-4">
                        <p class="text-sm font-semibold text-ink-800">Sem cobrança mínima</p>
                        <p class="mt-1 text-sm leading-relaxed text-ink-500">
                            Escola com 60 alunos paga por 60 alunos. O valor acompanha o tamanho
                            da escola, para cima e para baixo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
