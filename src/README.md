# Código Fonte

Este diretório concentra os módulos executáveis do projeto.

## Estrutura

```text
src/
├── backend/   # API Laravel
└── mobile/    # App mobile (em evolução)
```

## Backend (`src/backend`)

### Requisitos

- PHP 8.4 (ou 8.3+) com extensão `mongodb` habilitada
- Composer
- Node.js 20+
- NPM
- Herd (opcional, macOS)

### Instalação

```bash
cd src/backend
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### Execução local (sem Herd)

```bash
cd src/backend
php artisan serve
npm run dev
```

Acessos:
- App Laravel: `http://127.0.0.1:8000`
- Vite: `http://127.0.0.1:5173`

### Execução com Herd (opcional)

```bash
cd src/backend
herd link
npm run dev
```

Importante: o Herd deve apontar para `src/backend` (não para a raiz do monorepo).

### MongoDB Atlas

Enquanto o Atlas não estiver configurado, use SQLite local.

Quando criar o cluster Atlas, ajuste no `.env`:

```env
DB_CONNECTION=mongodb
DB_DSN=mongodb+srv://<usuario>:<senha>@cluster.mongodb.net/?retryWrites=true&w=majority
DB_DATABASE=silver_db
```

### Rotas de autenticação da API

- `POST /api/register`
- `POST /api/login`
- `GET /api/me` (Bearer token / `auth:sanctum`)

### Nota para usuários Herd + Composer

Se houver conflito de binário PHP/Composer no terminal, execute via caminho do Herd:

```bash
HERD_BIN="$HOME/Library/Application Support/Herd/bin"
"$HERD_BIN/php84" "$HERD_BIN/composer" install
```

## Mobile (`src/mobile`)

As instruções detalhadas do app mobile serão consolidadas neste README conforme evolução do módulo.
