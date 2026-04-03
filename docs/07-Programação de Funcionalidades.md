# Documentação da implementação da Web API Rest

Esta seção detalha a implementação da API Backend desenvolvida em **Laravel**, responsável por processar as regras de negócio e centralizar os dados no **MongoDB**.

## Configurações de Ambiente

A API requer as seguintes variáveis de ambiente configuradas no arquivo `.env`:

```env
APP_NAME=Silver
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mongodb
DB_DSN=mongodb+srv://<usuario>:<senha>@cluster.mongodb.net/silver_db?retryWrites=true&w=majority
DB_DATABASE=silver_db
```

### Instalação e Execução
1. `composer install`
2. `php artisan key:generate`
3. `php artisan serve`

---

## Autenticação

A API utiliza o **Laravel Sanctum** para autenticação baseada em tokens.
- **Formato:** Bearer Token
- **Header:** `Authorization: Bearer <token>`
- **Content-Type:** `application/json`

---

## Recursos e Rotas

### 1. Autenticação

#### **Registrar Novo Usuário**
- **URL:** `/api/register`
- **Método:** `POST`
- **Body:**
  ```json
  {
    "name": "João Silva",
    "email": "joao@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }
  ```
- **Resposta (201):**
  ```json
  {
    "user": { "id": "...", "name": "...", "email": "..." },
    "token": "..."
  }
  ```

#### **Login**
- **URL:** `/api/login`
- **Método:** `POST`
- **Body:**
  ```json
  {
    "email": "joao@example.com",
    "password": "password123"
  }
  ```
- **Resposta (200):** Token de acesso válido.

#### **Perfil Atual (Me)**
- **URL:** `/api/me`
- **Método:** `GET`
- **Proteção:** Ativa (`auth:sanctum`)
- **Resposta (200):** Dados do usuário logado e sua `familyId`.

---

### 2. Contas (Accounts) [Implementação em andamento]

#### **Listar Contas da Família**
- **URL:** `/api/accounts`
- **Método:** `GET`
- **Resposta:** Lista de contas (Itaú, Nubank, etc.) vinculadas à `familyId` do usuário.

---

### 3. Transações (Transactions) [Implementação em andamento]

#### **Registrar Transação**
- **URL:** `/api/transactions`
- **Método:** `POST`
- **Body:**
  ```json
  {
    "accountId": "...",
    "categoryId": "...",
    "type": "expense",
    "amount": 50.00,
    "description": "Jantar",
    "date": "2026-04-03"
  }
  ```

---

## Modelagem NoSQL

A implementação no MongoDB segue o padrão de **Documentos Embutidos** onde pertinente e **Referências** via ID para coleções principais (Transactions -> Accounts, Users -> Families). A flexibilidade do NoSQL é utilizada para permitir campos dinâmicos nas transações originadas pelo WhatsApp.