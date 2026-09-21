# Edully Site

Site de vendas do [Edully](https://agendaedully.com.br) (agenda digital escolar).

## Stack

- Laravel 13 + Blade + Vite + Tailwind
- Formulário de leads → tabela `leads`
- Deploy Docker no mesmo VPS do app (`/opt/apps/edully/site`)

## Desenvolvimento local

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run build
php artisan serve
```

## Deploy (produção)

Guia completo: [`deploy/HOSTINGER-SITE.md`](./deploy/HOSTINGER-SITE.md)

Resumo:

```bash
# No VPS
git clone -b main https://github.com/rafaelcacote/edully-site.git /opt/apps/edully/site
cd /opt/apps/edully/site
cp deploy/site/.env.example deploy/site/.env
# editar APP_KEY e DB_PASSWORD
cd deploy/site && docker compose up -d --build
```

Porta local no host: `127.0.0.1:8085` (Nginx CloudPanel faz proxy para o domínio).
