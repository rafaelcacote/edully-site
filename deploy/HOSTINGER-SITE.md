# Deploy site Edully — agendaedully.com.br

Landing Laravel na VPS Hostinger, ao lado do app, demo e mobile.

| Item | Valor |
|------|--------|
| Domínio | `https://agendaedully.com.br` (+ `www`) |
| Repo | https://github.com/rafaelcacote/edully-site |
| Pasta VPS | `/opt/apps/edully/site` |
| Porta host | `127.0.0.1:8085` → container |
| Compose | `edully-site` |
| Branch | `main` |

## Layout no servidor

```text
/opt/apps/edully/
├── staging/      # homolog.agendaedully.com.br :8081
├── production/   # app.agendaedully.com.br     :8082
├── demo/         # demo.agendaedully.com.br    :8083
├── mobile/       # m.agendaedully.com.br       :8084
└── site/         # agendaedully.com.br         :8085  ← este projeto
```

## 1ª vez na VPS

```bash
git clone -b main https://github.com/rafaelcacote/edully-site.git /opt/apps/edully/site
cd /opt/apps/edully/site

cp deploy/site/.env.example deploy/site/.env
# editar: APP_KEY, DB_PASSWORD, APP_URL
# gerar key: docker run --rm php:8.4-cli php -r "echo 'base64:'.base64_encode(random_bytes(32)), PHP_EOL;"

cd deploy/site
docker compose up -d --build
```

Gerar `APP_KEY` no host (se preferir):

```bash
cd /opt/apps/edully/site
docker compose -f deploy/site/docker-compose.yml run --rm --no-deps app php artisan key:generate --show
# cole o valor em deploy/site/.env como APP_KEY=...
docker compose -f deploy/site/docker-compose.yml up -d
```

## Nginx + SSL

```bash
grep -q 'agendaedully.com.br' /etc/nginx/sites-enabled/edully.conf \
  || cat /opt/apps/edully/site/deploy/proxy/nginx-site.conf >> /etc/nginx/sites-enabled/edully.conf

nginx -t && systemctl reload nginx

certbot --nginx -d agendaedully.com.br -d www.agendaedully.com.br \
  --non-interactive --agree-tos --redirect \
  -m admin@agendaedully.com.br || certbot --nginx -d agendaedully.com.br -d www.agendaedully.com.br
```

## Atualizar depois

```bash
cd /opt/apps/edully/site
git pull origin main
cd deploy/site
docker compose up -d --build
```

## Health check

```bash
curl -I http://127.0.0.1:8085/
curl -I https://agendaedully.com.br/
```

## Leads

Os contatos do formulário ficam na tabela `leads` do Postgres do compose (`edully_site`).

```bash
cd /opt/apps/edully/site/deploy/site
docker compose exec postgres psql -U edully -d edully_site -c 'select id, nome, email, created_at from leads order by created_at desc limit 20;'
```
