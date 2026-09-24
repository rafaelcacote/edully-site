<x-mail::message>
# Novo interesse no Edully

Um visitante pediu demonstração pelo site.

**Nome:** {{ $lead->nome }}  
**E-mail:** {{ $lead->email }}  
@if ($lead->telefone)
**Telefone:** {{ $lead->telefone }}  
@endif
@if ($lead->escola)
**Escola:** {{ $lead->escola }}  
@endif
@if ($lead->cargo)
**Cargo:** {{ $lead->cargo }}  
@endif
@if ($lead->quantidade_alunos)
**Alunos:** {{ number_format($lead->quantidade_alunos, 0, ',', '.') }}  
@endif

@if ($lead->mensagem)
**Mensagem**

{{ $lead->mensagem }}
@endif

---

Origem: {{ $lead->origem }} · Status: {{ $lead->status }} · {{ $lead->created_at?->timezone(config('app.timezone'))->format('d/m/Y H:i') }}

Você pode responder este e-mail para falar direto com o interessado.
</x-mail::message>
