@php
    $cargos = [
        'diretor' => 'Direção',
        'coordenador' => 'Coordenação pedagógica',
        'secretaria' => 'Secretaria',
        'ti' => 'TI / Tecnologia',
        'professor' => 'Professor',
        'outro' => 'Outro',
    ];

    $promises = [
        'Demonstração guiada de 30 minutos, na sua realidade',
        'Simulação do investimento com o número de alunos da sua escola',
        'Sem compromisso e sem cartão de crédito',
    ];
@endphp

<section id="contato" class="section relative overflow-hidden bg-ink-900">
    <div
        class="absolute inset-0 -z-10"
        style="background-image: radial-gradient(40rem 26rem at 18% 0%, rgb(5 111 189 / 0.45) 0%, transparent 60%), radial-gradient(32rem 22rem at 92% 100%, rgb(246 88 10 / 0.35) 0%, transparent 62%)"
        aria-hidden="true"
    ></div>

    <div class="shell">
        <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
            <div class="reveal">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs font-semibold tracking-wide text-action-300 uppercase">
                    Agendar demonstração
                </span>

                <h2 class="h2 mt-6 text-white">
                    Veja a agenda digital rodando na sua escola
                </h2>
                <p class="lead mt-5 text-ink-300">
                    Conte como vocês avisam os pais hoje — WhatsApp, agenda de papel ou os dois.
                    Mostramos como o Edully leva a informação do aluno até o celular do responsável.
                </p>

                <ul class="mt-8 space-y-3">
                    @foreach ($promises as $promise)
                        <li class="flex items-start gap-3 text-sm text-ink-300">
                            <span class="mt-0.5 grid size-5 shrink-0 place-items-center rounded-full bg-grow-500 text-white" aria-hidden="true">
                                <svg class="size-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2">
                                    <path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            {{ $promise }}
                        </li>
                    @endforeach
                </ul>

                @if ($contact['email'])
                    <p class="mt-8 text-sm text-ink-400">
                        Prefere e-mail?
                        <a href="mailto:{{ $contact['email'] }}" class="font-semibold text-white underline decoration-brand-400 decoration-2 underline-offset-4">
                            {{ $contact['email'] }}
                        </a>
                    </p>
                @endif
            </div>

            <div class="reveal" style="transition-delay: 100ms">
                <div class="rounded-3xl border border-white/10 bg-white p-6 shadow-lift sm:p-8">
                    @if (session('lead_enviado'))
                        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-grow-100 bg-grow-50 p-4" role="status">
                            <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-grow-500 text-white" aria-hidden="true">
                                <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-grow-700">Recebemos o seu contato</p>
                                <p class="mt-1 text-sm text-grow-700/80">
                                    Nossa equipe responde em até um dia útil para agendar a demonstração.
                                </p>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-action-100 bg-action-50 p-4" role="alert">
                            <p class="text-sm font-semibold text-action-700">Revise os campos destacados abaixo.</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('site.leads.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="nome" class="block text-sm font-medium text-ink-800">Seu nome *</label>
                                <input
                                    id="nome"
                                    name="nome"
                                    type="text"
                                    value="{{ old('nome') }}"
                                    required
                                    autocomplete="name"
                                    @class([
                                        'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                        'border-action-500' => $errors->has('nome'),
                                        'border-ink-200' => ! $errors->has('nome'),
                                    ])
                                    placeholder="Maria Silva"
                                >
                                @error('nome')
                                    <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="escola" class="block text-sm font-medium text-ink-800">Escola</label>
                                <input
                                    id="escola"
                                    name="escola"
                                    type="text"
                                    value="{{ old('escola') }}"
                                    autocomplete="organization"
                                    @class([
                                        'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                        'border-action-500' => $errors->has('escola'),
                                        'border-ink-200' => ! $errors->has('escola'),
                                    ])
                                    placeholder="Colégio Aurora"
                                >
                                @error('escola')
                                    <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-ink-800">E-mail *</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    @class([
                                        'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                        'border-action-500' => $errors->has('email'),
                                        'border-ink-200' => ! $errors->has('email'),
                                    ])
                                    placeholder="maria@colegioaurora.com.br"
                                >
                                @error('email')
                                    <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telefone" class="block text-sm font-medium text-ink-800">WhatsApp</label>
                                <input
                                    id="telefone"
                                    name="telefone"
                                    type="tel"
                                    value="{{ old('telefone') }}"
                                    autocomplete="tel"
                                    inputmode="numeric"
                                    @class([
                                        'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                        'border-action-500' => $errors->has('telefone'),
                                        'border-ink-200' => ! $errors->has('telefone'),
                                    ])
                                    placeholder="(91) 98888-7777"
                                >
                                @error('telefone')
                                    <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="cargo" class="block text-sm font-medium text-ink-800">Seu cargo</label>
                                <select
                                    id="cargo"
                                    name="cargo"
                                    @class([
                                        'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                        'border-action-500' => $errors->has('cargo'),
                                        'border-ink-200' => ! $errors->has('cargo'),
                                    ])
                                >
                                    <option value="">Selecione</option>
                                    @foreach ($cargos as $value => $label)
                                        <option value="{{ $value }}" @selected(old('cargo') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('cargo')
                                    <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="quantidade_alunos" class="block text-sm font-medium text-ink-800">Quantidade de alunos</label>
                                <input
                                    id="quantidade_alunos"
                                    name="quantidade_alunos"
                                    type="number"
                                    min="1"
                                    value="{{ old('quantidade_alunos') }}"
                                    inputmode="numeric"
                                    @class([
                                        'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                        'border-action-500' => $errors->has('quantidade_alunos'),
                                        'border-ink-200' => ! $errors->has('quantidade_alunos'),
                                    ])
                                    placeholder="300"
                                >
                                @error('quantidade_alunos')
                                    <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="mensagem" class="block text-sm font-medium text-ink-800">Como a escola se organiza hoje?</label>
                            <textarea
                                id="mensagem"
                                name="mensagem"
                                rows="3"
                                @class([
                                    'mt-1.5 w-full rounded-xl border bg-white px-3.5 py-2.5 text-sm text-ink-900 placeholder:text-ink-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 focus:outline-none',
                                    'border-action-500' => $errors->has('mensagem'),
                                    'border-ink-200' => ! $errors->has('mensagem'),
                                ])
                                placeholder="Avisamos os pais pelo WhatsApp e ainda usamos agenda de papel..."
                            >{{ old('mensagem') }}</textarea>
                            @error('mensagem')
                                <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="consentimento" class="flex items-start gap-3 text-xs leading-relaxed text-ink-500">
                                <input
                                    id="consentimento"
                                    name="consentimento"
                                    type="checkbox"
                                    value="1"
                                    @checked(old('consentimento'))
                                    class="mt-0.5 size-4 shrink-0 rounded border-ink-300 text-brand-600 focus:ring-2 focus:ring-brand-200"
                                >
                                <span>
                                    Autorizo o contato da equipe Edully e o uso destes dados exclusivamente
                                    para esta finalidade, conforme a Lei Geral de Proteção de Dados.
                                </span>
                            </label>
                            @error('consentimento')
                                <p class="mt-1.5 text-xs font-medium text-action-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary w-full px-6 py-3.5 text-base">
                            Quero ver o Edully funcionando
                        </button>

                        <p class="text-center text-xs text-ink-400">
                            Resposta em até um dia útil. Seus dados não são compartilhados com terceiros.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
