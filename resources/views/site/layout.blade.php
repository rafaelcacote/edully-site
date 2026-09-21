<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Edully — Agenda digital online para a escola e a família')</title>
        @php
            $priceLabel = 'R$ '.number_format((float) config('edully.pricing.price_per_student'), 2, ',', '.');
            $defaultDescription = "Edully é a agenda digital online da escola: notas, provas, comunicados e o dia a dia do aluno chegam no celular do pai — sem depender do WhatsApp. A partir de {$priceLabel} por aluno.";
            $defaultOgDescription = "A agenda da escola no celular do pai. Sem depender do grupo de WhatsApp. A partir de {$priceLabel} por aluno.";
        @endphp
        <meta name="description" content="@yield('description', $defaultDescription)">
        <link rel="canonical" href="{{ url('/') }}">
        <meta name="theme-color" content="#056fbd">
        <meta name="robots" content="index, follow">

        <meta property="og:type" content="website">
        <meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="Edully">
        <meta property="og:title" content="@yield('title', 'Edully — Agenda digital online para a escola e a família')">
        <meta property="og:description" content="@yield('description', $defaultOgDescription)">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:image" content="{{ url('/images/logo.svg') }}">
        <meta name="twitter:card" content="summary_large_image">

        <link rel="icon" href="/images/edully_logo.svg" type="image/svg+xml">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">

        @vite(['resources/js/site.js'])

        @php
            $structuredData = [
                '@context' => 'https://schema.org',
                '@type' => 'SoftwareApplication',
                'name' => 'Edully',
                'applicationCategory' => 'BusinessApplication',
                'operatingSystem' => 'Web, Android',
                'inLanguage' => 'pt-BR',
                'description' => 'Agenda digital online para escolas: notas, provas, comunicados e o dia a dia do aluno chegam no celular do responsável, com painel web e aplicativo.',
                'url' => url('/'),
                'offers' => [
                    '@type' => 'Offer',
                    'price' => number_format((float) config('edully.pricing.price_per_student'), 2, '.', ''),
                    'priceCurrency' => 'BRL',
                    'description' => 'Por aluno ativo, por mês, sem cobrança mínima.',
                ],
            ];
        @endphp

        <script type="application/ld+json">
            @json($structuredData)
        </script>
    </head>
    <body>
        <a href="#funcionalidades" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:rounded-lg focus:bg-brand-600 focus:px-4 focus:py-2 focus:text-white">
            Pular para o conteúdo
        </a>

        @include('site.partials.header')

        <main>
            @yield('content')
        </main>

        @include('site.partials.footer')
    </body>
</html>
