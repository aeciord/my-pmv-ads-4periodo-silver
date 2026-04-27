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
- Docker (para o MongoDB local)
- Herd (opcional, macOS)

### Instalação e execução local

```bash
cd src/backend

# 1. Subir o MongoDB via Docker
docker compose up -d

# 2. Instalar dependências PHP
composer install

# 3. Configurar ambiente
cp .env.example .env
php artisan key:generate

# 4. Criar tabelas SQLite (sessões, cache, etc.)
php artisan migrate

# 5. Subir o servidor
php artisan serve
```

Acesso: `http://127.0.0.1:8000`

### Execução com Herd (opcional, macOS)

```bash
cd src/backend
docker compose up -d
herd link
```

Importante: o Herd deve apontar para `src/backend` (não para a raiz do monorepo).

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
