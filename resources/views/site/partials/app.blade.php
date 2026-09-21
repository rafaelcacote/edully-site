@php
    $forFamilies = [
        'Notas e boletim de cada filho, atualizados em tempo real',
        'Provas e exercícios com data, horário e anexos',
        'Comunicados da escola com notificação no celular',
        'Recados diretos com a equipe, sem grupo de WhatsApp',
        'Lista de professores da turma do filho',
    ];

    $forTeachers = [
        'Suas turmas e disciplinas na mão, em qualquer lugar',
        'Publicar prova ou exercício direto do celular',
        'Responder recados de responsáveis',
        'Consultar a lista de alunos por turma',
    ];

    $appShots = [
        ['src' => '/imagens_app/tela_principal.png', 'alt' => 'Tela principal do app Edully'],
        ['src' => '/imagens_app/calendario_provas.png', 'alt' => 'Calendário de provas no app Edully'],
        ['src' => '/imagens_app/boletim.png', 'alt' => 'Boletim escolar no app Edully'],
        ['src' => '/imagens_app/financeiro.png', 'alt' => 'Financeiro no app Edully'],
    ];
@endphp

<section id="aplicativo" class="section relative overflow-hidden bg-ink-900">
    <div
        class="absolute inset-0 -z-10 opacity-60"
        style="background-image: radial-gradient(38rem 24rem at 82% 12%, rgb(5 111 189 / 0.5) 0%, transparent 62%), radial-gradient(30rem 20rem at 8% 88%, rgb(61 174 74 / 0.35) 0%, transparent 65%)"
        aria-hidden="true"
    ></div>

    <div class="shell">
        <div class="reveal mx-auto max-w-3xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs font-semibold tracking-wide text-brand-200 uppercase">
                Agenda no celular · Android agora · iOS em breve
            </span>

            <h2 class="h2 mt-6 text-white">
                A agenda digital no bolso do pai
            </h2>
            <p class="lead mx-auto mt-5 max-w-2xl text-ink-300">
                É aqui que a proposta do Edully se completa: manter o responsável informado
                sobre o aluno. O pai entra com o CPF, vê todos os filhos em um só lugar e
                recebe notificação a cada nota, prova e comunicado — sem depender do WhatsApp.
            </p>
        </div>

        <div
            class="reveal mx-auto mt-12 grid max-w-[920px] grid-cols-2 justify-items-center gap-4 sm:gap-5 lg:grid-cols-4 lg:gap-6"
            aria-label="Telas do aplicativo Edully"
        >
            @foreach ($appShots as $shot)
                <div class="w-full max-w-[168px] sm:max-w-[180px] lg:max-w-[190px]">
                    <div class="overflow-hidden rounded-[1.5rem] border-[7px] border-ink-950 bg-ink-950 shadow-lift sm:rounded-[1.7rem] sm:border-[8px]">
                        <img
                            src="{{ $shot['src'] }}"
                            alt="{{ $shot['alt'] }}"
                            class="block h-auto w-full"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>
            @endforeach
        </div>

        <div class="reveal mt-12 grid gap-8 sm:grid-cols-2 sm:gap-10 lg:mx-auto lg:max-w-3xl">
            <div>
                <h3 class="flex items-center gap-2.5 text-sm font-semibold text-white">
                    <span class="grid size-7 place-items-center rounded-lg bg-brand-500/20 text-brand-200" aria-hidden="true">
                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 19a4 4 0 0 0-8 0M12 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Para responsáveis
                </h3>
                <ul class="mt-4 space-y-3 border-t border-white/10 pt-4">
                    @foreach ($forFamilies as $item)
                        <li class="flex items-start gap-2.5 text-sm leading-snug text-ink-300">
                            <span class="mt-2 size-1.5 shrink-0 rounded-full bg-brand-400" aria-hidden="true"></span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="flex items-center gap-2.5 text-sm font-semibold text-white">
                    <span class="grid size-7 place-items-center rounded-lg bg-grow-500/20 text-grow-400" aria-hidden="true">
                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 6h16M4 12h16M4 18h10" stroke-linecap="round"/>
                        </svg>
                    </span>
                    Para professores
                </h3>
                <ul class="mt-4 space-y-3 border-t border-white/10 pt-4">
                    @foreach ($forTeachers as $item)
                        <li class="flex items-start gap-2.5 text-sm leading-snug text-ink-300">
                            <span class="mt-2 size-1.5 shrink-0 rounded-full bg-grow-400" aria-hidden="true"></span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <p class="reveal mx-auto mt-10 max-w-2xl text-center text-sm leading-relaxed text-ink-400">
            <strong class="font-semibold text-white">Responsáveis e professores não entram na conta.</strong>
            Você paga apenas pelos alunos ativos — quantos adultos usarem o app não altera o valor.
        </p>
    </div>
</section>
