@php
    $navLinks = [
        '#funcionalidades' => 'Funcionalidades',
        '#aplicativo' => 'Aplicativo',
        '#para-quem' => 'Para quem é',
        '#planos' => 'Planos',
        '#perguntas' => 'Perguntas',
    ];
@endphp

<header data-header class="sticky top-0 z-40 border-b border-transparent bg-white/85 backdrop-blur-lg transition-shadow duration-300">
    <div class="shell flex h-18 items-center justify-between gap-6 py-3">
        <a href="{{ route('home') }}" class="flex shrink-0 items-center" aria-label="Edully — página inicial">
            <img src="/images/logo.svg" alt="Edully" class="h-9 w-auto">
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="Navegação principal">
            @foreach ($navLinks as $href => $label)
                <a href="{{ $href }}" class="rounded-lg px-3 py-2 text-sm font-medium text-ink-600 transition-colors hover:bg-ink-100 hover:text-ink-900">
                    {{ $label }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-2">
            <a href="{{ config('edully.login_url') }}" class="hidden btn-ghost text-sm sm:inline-flex">Entrar</a>
            <a href="#contato" class="btn-primary hidden text-sm sm:inline-flex">Agendar demonstração</a>

            <button
                type="button"
                data-menu-toggle
                aria-expanded="false"
                aria-controls="menu-mobile"
                aria-label="Abrir menu"
                class="grid size-10 place-items-center rounded-lg border border-ink-200 text-ink-700 lg:hidden"
            >
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="menu-mobile" data-menu class="hidden border-t border-ink-200 bg-white lg:hidden">
        <div class="shell flex flex-col gap-1 py-4">
            @foreach ($navLinks as $href => $label)
                <a href="{{ $href }}" class="rounded-lg px-3 py-2.5 text-sm font-medium text-ink-700 hover:bg-ink-100">
                    {{ $label }}
                </a>
            @endforeach

            <div class="mt-3 flex flex-col gap-2">
                <a href="{{ config('edully.login_url') }}" class="btn-secondary">Entrar</a>
                <a href="#contato" class="btn-primary">Agendar demonstração</a>
            </div>
        </div>
    </div>
</header>
