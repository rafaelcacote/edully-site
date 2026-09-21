@extends('site.layout')

@section('title', 'Edully — Agenda digital online para a escola e a família')
@section('description', 'Edully é a agenda digital online da escola: notas, provas, comunicados e o dia a dia do aluno chegam no celular do pai — sem depender do grupo de WhatsApp. A partir de R$ '.number_format((float) config('edully.pricing.price_per_student'), 2, ',', '.').' por aluno.')

@section('content')
    @include('site.partials.hero')
    @include('site.partials.problems')
    @include('site.partials.how-it-works')
    @include('site.partials.features')
    @include('site.partials.spotlights')
    @include('site.partials.app')
    @include('site.partials.audiences')
    @include('site.partials.pricing')
    @include('site.partials.roadmap')
    @include('site.partials.faq')
    @include('site.partials.contact')
@endsection
