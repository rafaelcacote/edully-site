<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Domínios
    |--------------------------------------------------------------------------
    |
    | Quando os dois domínios estão definidos, o site de vendas responde apenas
    | em "site" e a aplicação apenas em "app" — o que mantém o SEO do site
    | separado da área logada. Sem essas variáveis, tudo responde no mesmo
    | host, que é o comportamento usado em desenvolvimento e nos testes.
    |
    | Informe apenas o host, sem esquema: "agendaedully.com.br".
    |
    */

    'domains' => [
        'site' => env('EDULLY_SITE_DOMAIN'),
        'app' => env('EDULLY_APP_DOMAIN'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Precificação comercial
    |--------------------------------------------------------------------------
    |
    | Valores exibidos no site público. A cobrança é por aluno ativo, sem
    | mínimo mensal. No ciclo anual a escola paga apenas "billed_months"
    | meses e utiliza a plataforma pelos 12.
    |
    */

    'pricing' => [
        'price_per_student' => env('EDULLY_PRICE_PER_STUDENT', 2.50),
        'annual_billed_months' => env('EDULLY_ANNUAL_BILLED_MONTHS', 10),
        'default_students' => env('EDULLY_DEFAULT_STUDENTS', 300),
        'min_students' => env('EDULLY_MIN_STUDENTS', 20),
        'max_students' => env('EDULLY_MAX_STUDENTS', 3000),
    ],

    /*
    |--------------------------------------------------------------------------
    | Contato comercial
    |--------------------------------------------------------------------------
    */

    'contact' => [
        'email' => env('EDULLY_CONTACT_EMAIL', 'contato@agendaedully.com.br'),
        // Número com DDI, só dígitos — ex.: 5591999999999 (vira link wa.me).
        'whatsapp' => env('EDULLY_CONTACT_WHATSAPP'),
        // URL completa ou @usuario — ex.: https://instagram.com/edully ou @edully.
        'instagram' => env('EDULLY_CONTACT_INSTAGRAM'),
        // Destino dos avisos de novo lead (padrão = e-mail de contato).
        'notify_email' => env('EDULLY_LEAD_NOTIFY_EMAIL', 'contato@agendaedully.com.br'),
    ],

    /*
    |--------------------------------------------------------------------------
    | URL de login da aplicação
    |--------------------------------------------------------------------------
    |
    | O site é um projeto separado; o botão "Entrar" aponta para o app.
    |
    */

    'login_url' => env('EDULLY_LOGIN_URL', 'https://app.agendaedully.com.br/login'),

];
