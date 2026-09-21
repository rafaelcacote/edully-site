<?php

namespace Tests\Feature\Site;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class DomainRoutingTest extends TestCase
{
    /**
     * @return \Illuminate\Routing\RouteCollectionInterface
     */
    protected function registerWebRoutesInIsolation(?string $site)
    {
        config([
            'edully.domains.site' => $site,
        ]);

        $original = app('router');
        $isolated = new Router(app('events'), app());

        Route::swap($isolated);

        try {
            require base_path('routes/web.php');

            $routes = $isolated->getRoutes();
            $routes->refreshNameLookups();

            return $routes;
        } finally {
            Route::swap($original);
        }
    }

    public function test_keeps_routes_on_the_same_host_when_no_domain_is_configured(): void
    {
        $routes = $this->registerWebRoutesInIsolation(null);

        $this->assertNull($routes->getByName('home')->getDomain());
        $this->assertNull($routes->getByName('site.leads.store')->getDomain());
    }

    public function test_binds_sales_routes_to_the_site_domain_when_configured(): void
    {
        $routes = $this->registerWebRoutesInIsolation('agendaedully.test');

        $this->assertSame('agendaedully.test', $routes->getByName('home')->getDomain());
        $this->assertSame('agendaedully.test', $routes->getByName('site.leads.store')->getDomain());
    }

    public function test_does_not_mark_the_sales_page_as_noindex(): void
    {
        $this->withoutVite();

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('name="robots" content="index, follow"', false);
    }
}
