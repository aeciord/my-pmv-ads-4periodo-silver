# SILVER

`PUC - Análise e Desenvolvimento de Sistemas`

`Eixo 4 - Sistemas Distribuídos`

`4º SEMESTRE`

![Logo](./docs/img/logo.jpeg)

## 🚀 Tecnologias

![Next.js](https://img.shields.io/badge/Next.js-000?style=for-the-badge&logo=nextdotjs&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![JWT](https://img.shields.io/badge/JWT-black?style=for-the-badge&logo=jsonwebtokens&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![TypeScript](https://img.shields.io/badge/TypeScript-3178C6?style=for-the-badge&logo=typescript&logoColor=white)
![React Native](https://img.shields.io/badge/React_Native-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)

Silver é uma aplicação distribuída de alto desempenho projetada para auxiliar pessoas a organizarem melhor suas finanças. O sistema foca em acessibilidade e eficiência, permitindo a gestão inteligente de ativos e despesas em um ambiente distribuído.

## Integrantes

* Adrian Sodré da Silva
* Aécio Ribeiro Dantas Neto
* Nathan David Reis
* Victor da Silva Folgado
* Vinícius Soares Pires e Luz
* Yago Lopes Miranda

## Orientador

* Carolina Stephanie Jerônimo de Almeida

## Instruções de utilização

### Backend Laravel

O backend foi instalado em `src/backend`. Como o projeto esta em estrutura de monorepo, o Laravel nao fica na raiz do repositorio.

#### Requisitos

- PHP 8.4 (ou 8.3+) com extensao `mongodb` habilitada
- Composer
- Node.js 20 ou superior
- NPM
- Herd (opcional, para ambiente local no macOS)

#### Instalação

```bash
cd src/backend
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

Se o projeto usar banco local em SQLite para desenvolvimento inicial, o arquivo `database/database.sqlite` ja pode ser aproveitado. Se usar MongoDB Atlas, ajuste as variaveis de ambiente no arquivo `.env`.

Status atual do backend:

- Laravel 12 em `src/backend`
- Pacotes instalados: `mongodb/laravel-mongodb`, `laravel/sanctum`, `laravel/boost`, `laravel/mcp`
- Rotas de API de autenticacao: `POST /api/register`, `POST /api/login`, `GET /api/me`
- Enquanto o Atlas nao for configurado, o fluxo web funciona com SQLite local

#### Como executar sem Herd

Esta e a forma mais direta para qualquer integrante validar o backend:

```bash
cd src/backend
php artisan serve
npm run dev
```

Depois acesse:

- Laravel: `http://127.0.0.1:8000`
- Vite: `http://127.0.0.1:5173`

Importante:

- `php artisan serve` sobe a aplicacao Laravel.
- `npm run dev` sobe apenas o servidor do Vite para CSS e JavaScript.
- Abrir somente o endereco do Vite nao substitui o servidor Laravel.

#### Como executar com Herd

Se for usar Herd, o ponto importante e este: o Herd precisa apontar para a pasta do projeto Laravel, e nao para a raiz do monorepo.

Como o arquivo `artisan` esta em `src/backend`, e essa pasta que deve ser vinculada no Herd.

Fluxo recomendado:

```bash
cd src/backend
herd link
npm install
npm run dev
```

Depois, acesse a URL gerada pelo Herd para a pasta `src/backend`. O nome exato depende do alias criado no `herd link`.

#### Observacao sobre Composer + Herd

Se houver erro de extensao `ext-mongodb` ausente mesmo com a extensao ativa no Herd, rode o Composer explicitamente com o PHP do Herd:

```bash
"/Users/aecioneto/Library/Application Support/Herd/bin/php84" \
"/Users/aecioneto/Library/Application Support/Herd/bin/composer" install
```

#### Por que `npm run dev` nao mostra a aplicacao?

Porque esse comando nao publica a pagina principal do Laravel. Ele apenas compila e serve os assets do frontend.

Para ver a tela inicial do Laravel, a rota `/` precisa ser atendida pelo PHP. No projeto atual, isso acontece em `src/backend/routes/web.php`, onde a raiz aponta para a view `welcome`.

#### Fluxo minimo para validar se esta funcionando

```bash
cd src/backend
php artisan serve
npm run dev
```

Em seguida:

1. Abra `http://127.0.0.1:8000`
2. Verifique se a tela `welcome` do Laravel aparece
3. Edite um arquivo em `resources/views` ou `resources/css/app.css`
4. Recarregue a pagina para validar integracao com Vite

#### Observações para a equipe

- Sempre execute comandos Laravel dentro de `src/backend`.
- Se usar Herd, vincule `src/backend`, nao a raiz do repositorio.
- Se a aplicacao abrir sem estilo, normalmente o Laravel esta no ar, mas o Vite nao esta rodando.
- Se `localhost` nao mostrar nada, provavelmente o servidor PHP correto nao foi iniciado ou o Herd esta apontando para a pasta errada.

# Documentação

<ol>
<li><a href="docs/01-Documentação de Contexto.md"> Documentação de Contexto</a></li>
<li><a href="docs/02-Especificação do Projeto.md"> Especificação do Projeto</a></li>
<li><a href="docs/03-Metodologia.md"> Metodologia</a></li>
<li><a href="docs/04-Projeto de Interface.md"> Projeto de Interface</a></li>
<li><a href="docs/05-Arquitetura da Solução.md"> Arquitetura da Solução</a></li>
<li><a href="docs/06-Template Padrão da Aplicação.md"> Template Padrão da Aplicação</a></li>
<li><a href="docs/07-Programação de Funcionalidades.md"> Programação de Funcionalidades</a></li>
<li><a href="docs/08-Registro de Testes Unitários.md"> Registro de Testes Unitários</a></li>
<li><a href="docs/09-Registro de Testes de Integração.md"> Registro de Testes de Integração</a></li>
<li><a href="docs/10-Registro de Testes de Sistema.md"> Registro de Testes de Sistema</a></li>
<li><a href="docs/11-Registro de Contribuição.md"> Registro de Contribuição</a></li>
<li><a href="docs/12-Apresentação do Projeto.md"> Apresentação do Projeto</a></li>
<li><a href="docs/13-Referências.md"> Referências</a></li>
</ol>

# Código

<li><a href="src/README.md"> Código Fonte</a></li>

# Apresentação

<li><a href="presentation/README.md"> Apresentação da solução</a></li>
