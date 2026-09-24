<?php

namespace Tests\Feature\Site;

use App\Mail\LeadReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
        Mail::fake();
    }

    public function test_renders_the_public_sales_page(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('No celular do pai.', false);
        $response->assertSee('Agenda digital online', false);
        $response->assertSee('Funcionalidades', false);
        $response->assertSee('Agendar demonstração', false);
        $response->assertSee('contato@agendaedully.com.br', false);
        $response->assertDontSee('comercial@agendaedully.com.br', false);
    }

    public function test_shows_the_per_student_price_on_the_sales_page(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('R$ 2,50 por aluno', false);
    }

    public function test_stores_a_lead_coming_from_the_sales_page(): void
    {
        $response = $this->post(route('site.leads.store'), [
            'nome' => 'Maria Silva',
            'email' => 'MARIA@colegioaurora.com.br',
            'telefone' => '(91) 98888-7777',
            'escola' => 'Colégio Aurora',
            'cargo' => 'diretor',
            'quantidade_alunos' => 300,
            'mensagem' => 'Hoje usamos planilha para as notas.',
            'consentimento' => '1',
        ]);

        $response->assertRedirect(route('home').'#contato');
        $response->assertSessionHas('lead_enviado', true);

        $this->assertDatabaseHas('leads', [
            'nome' => 'Maria Silva',
            'email' => 'maria@colegioaurora.com.br',
            'telefone' => '91988887777',
            'escola' => 'Colégio Aurora',
            'cargo' => 'diretor',
            'quantidade_alunos' => 300,
            'origem' => 'landing',
            'status' => 'novo',
        ]);

        Mail::assertSent(LeadReceived::class, function (LeadReceived $mail) {
            return $mail->lead->email === 'maria@colegioaurora.com.br'
                && $mail->hasTo(config('edully.contact.notify_email'));
        });
    }

    public function test_rejects_a_lead_without_the_required_fields(): void
    {
        $response = $this->post(route('site.leads.store'), []);

        $response->assertSessionHasErrors(['nome', 'email', 'consentimento']);

        $this->assertDatabaseCount('leads', 0);
    }

    #[DataProvider('invalidLeadProvider')]
    public function test_rejects_a_lead_when_the_data_is_invalid(array $payload, string $field): void
    {
        $response = $this->post(route('site.leads.store'), [
            'nome' => 'Maria Silva',
            'email' => 'maria@colegioaurora.com.br',
            'consentimento' => '1',
            ...$payload,
        ]);

        $response->assertSessionHasErrors($field);

        $this->assertDatabaseCount('leads', 0);
    }

    public static function invalidLeadProvider(): array
    {
        return [
            'e-mail inválido' => [['email' => 'nao-e-um-email'], 'email'],
            'telefone curto' => [['telefone' => '9999'], 'telefone'],
            'cargo fora da lista' => [['cargo' => 'presidente'], 'cargo'],
            'quantidade de alunos zerada' => [['quantidade_alunos' => 0], 'quantidade_alunos'],
            'consentimento negado' => [['consentimento' => '0'], 'consentimento'],
        ];
    }
}
