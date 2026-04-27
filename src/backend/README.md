# Backend Silver (Laravel)

Este backend expõe a API do Silver e centraliza autenticação, regras de negócio e acesso a dados.

## Objetivo

- Servir dados para clientes Web e Mobile
- Autenticar usuários com token (Sanctum)
- Preparar integração com MongoDB Atlas

## Estrutura Laravel (resumo)

```text
src/backend
├── app/
│   ├── Http/Controllers/      # Controladores HTTP (ex.: AuthController)
│   ├── Models/                # Modelos Eloquent (ex.: User)
│   ├── Actions/Fortify/       # Fluxos de auth web (registro, reset de senha)
│   └── Providers/             # Configuração de serviços
├── bootstrap/
│   └── app.php                # Bootstrap e registro de rotas web/api
├── config/                    # Configurações (auth, database, sanctum...)
├── database/
│   ├── migrations/            # Estrutura do banco
│   ├── factories/             # Dados fake para testes
│   └── seeders/               # Carga inicial opcional
├── resources/views/           # Telas Blade (web/admin/auth)
├── routes/
│   ├── web.php                # Rotas web
│   ├── api.php                # Rotas API
│   └── settings.php           # Rotas de configurações
├── tests/                     # Testes de feature e unitários
└── public/                    # Entrada pública da aplicação
```

## Como os clientes consomem a API

### 1) Registro

`POST /api/register`

Exemplo JSON:

```json
{
  "name": "Cliente Teste",
  "email": "cliente@exemplo.com",
  "password": "12345678"
}
```

### 2) Login

`POST /api/login`

Exemplo JSON:

```json
{
  "email": "cliente@exemplo.com",
  "password": "12345678"
}
```

Resposta esperada: objeto `user`, `token` e `token_type`.

### 3) Acesso autenticado

`GET /api/me`

Header:

```http
Authorization: Bearer <token>
Accept: application/json
```

## Banco de dados

O projeto usa dois bancos simultaneamente:

| Banco | Responsabilidade |
|---|---|
| SQLite | Sessões, cache, jobs e migrations internas do Laravel |
| MongoDB | Todo o domínio de negócio: contas, transações, orçamentos, metas, famílias |

### Desenvolvimento local (Docker)

O ambiente local usa um container MongoDB em vez de Atlas. É necessário ter o Docker instalado.

```bash
# Na pasta src/backend, suba o MongoDB:
docker compose up -d

# Para parar:
docker compose down

# Para parar e apagar os dados:
docker compose down -v
```

O container expõe o MongoDB em `localhost:27017` e persiste os dados no volume `silver_mongodb_data` entre reinicializações.

### Produção (MongoDB Atlas)

Quando o cluster Atlas estiver configurado, altere no `.env`:

```env
DB_DSN=mongodb+srv://<usuario>:<senha>@cluster.mongodb.net/?retryWrites=true&w=majority
DB_DATABASE=silver_db
```

## Execução local

```bash
cd src/backend

# 1. Subir o MongoDB
docker compose up -d

# 2. Instalar dependências
composer install

# 3. Configurar ambiente
cp .env.example .env
php artisan key:generate

# 4. Criar tabelas SQLite (sessões, cache, etc.)
php artisan migrate

# 5. Subir o servidor
php artisan serve
```

## Convenções para equipe

- Comandos Laravel sempre em `src/backend`
- Rotas de API novas devem entrar em `routes/api.php`
- Validações devem ficar no backend (não confiar só no cliente)
- Endpoints privados devem usar `auth:sanctum`
