# Gerenciador de Livros e Empréstimos

Aplicação web para gerenciar um acervo de livros e controlar empréstimos entre usuários. Desenvolvida com Laravel 12, Tailwind CSS e integração com SenhaÚnica da USP.

## 🎯 Funcionalidades

- ✅ **Gerenciamento de Livros**: Criar, editar, visualizar e deletar livros
- ✅ **Categorização**: Livros classificados por tipo/gênero
- ✅ **Galeria de Imagens**: Upload e gerenciamento de capas e imagens dos livros
- ✅ **Controle de Empréstimos**: Registrar empréstimos e devoluções de livros
- ✅ **Autenticação**: Integração com SenhaÚnica dispõe da USP
- ✅ **Autorização**: Controle de permissões por usuário
- ✅ **Interface Responsiva**: Tema USP com Tailwind CSS

## 🛠️ Tecnologias

- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS 4, Vite
- **Banco de Dados**: MySQL/PostgreSQL
- **Autenticação**: SenhaÚnica (uspdev/senhaunica-socialite)
- **Tema**: Laravel USP Theme (uspdev/laravel-usp-theme)

## 📋 Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Node.js 18+ e npm
- MySQL/PostgreSQL
- Git

## 🚀 Instalação e Configuração

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd livros
```

### 2. Instale as dependências PHP

```bash
composer install
```


### 3. Copie o arquivo de configuração

```bash
cp .env.example .env
```

### 4. Gere a chave de aplicação

```bash
php artisan key:generate
```

### 5. Configure o banco de dados

Edite o arquivo `.env` com suas credenciais:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=livros
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Execute as migrações e seeders

```bash
php artisan migrate:fresh --seed
```

### 7. Inicie o servidor

```bash
php artisan serve
```

A aplicação estará disponível em `http://localhost:8000`

## 📂 Estrutura do Projeto

```
app/
├── Http/
│   ├── Controllers/        # Controllers da aplicação
│   └── Requests/          # Form Requests com validação
├── Models/                # Modelos do banco de dados
│   ├── Livro.php
│   ├── File.php
│   ├── Emprestimos.php
│   └── User.php
└── Policies/              # Políticas de autorização

database/
├── migrations/            # Migrações do banco
├── seeders/              # Seeders para dados iniciais
└── factories/            # Factories para testes

resources/
├── views/                # Templates Blade
│   ├── layouts/         # Layout principal
│   ├── livros/          # Views de livros
│   └── files/           # Views de arquivos


routes/
├── web.php              # Rotas web
└── console.php          # Comandos Artisan
```

## 🔧 Modelos Principais

### Livro

Representa um livro no acervo com informações como título, autor, preço e tipo.

```php
- titulo: string
- autor: string
- descricao: text
- preco: decimal
- tipo: string
- user_id: foreign key (proprietário)
```

**Relacionamentos**:
- `user()`: BelongsTo - Usuário proprietário
- `files()`: HasMany - Imagens/arquivos do livro
- `emprestimos()`: BelongsToMany - Empréstimos registrados

### File

Representa arquivos (imagens) associados aos livros.

```php
- name: string
- path: string
- livro_id: foreign key
```

### Emprestimos

Registro de empréstimos entre usuários com controle de devolução.

```php
- livro_id: foreign key
- user_id: foreign key (quem pegou emprestado)
- data_devolucao: date
```

### User

Usuário do sistema com integração SenhaÚnica.

```php
- name: string
- email: email
- codpes: string (código USP)
- email_usp: string
```

## 📚 Rotas Principais

```
GET  /                    # Página inicial
GET  /livros              # Listar livros
POST /livros              # Criar livro
GET  /livros/{id}         # Detalhes do livro
PUT  /livros/{id}         # Atualizar livro
DELETE /livros/{id}       # Deletar livro

POST /emprestar/{livro}   # Registrar empréstimo
POST /devolver/{livro}    # Registrar devolução

POST /files               # Upload de arquivo
DELETE /files/{id}        # Deletar arquivo
```

## 📝 Bibliotecas Usadas

- **uspdev/laravel-usp-theme** — Tema institucional da USP
- **uspdev/senhaunica-socialite** — Autenticação via SenhaÚnica USP
- **uspdev/laravel-usp-faker** — Geradores de dados fake no padrão USP



## 📝 Variáveis de Ambiente Importantes

```env
APP_NAME=Livros
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=livros

APP_URL=http://localhost:8000

# Credenciais/informações do oauth
SENHAUNICA_KEY
SENHAUNICA_SECRET
SENHAUNICA_CALLBACK_ID

REPLICADO_HOST
REPLICADO_PORT
REPLICADO_DATABASE
REPLICADO_USERNAME
REPLICADO_PASSWORD
REPLICADO_CODUNDCLG
REPLICADO_SYBASE

```