<h1 align="center">Loja Virtual ADS</h1>

Plataforma de loja virtual para publicação e gerenciamento de produtos, desenvolvida com Laravel.

## Sobre o Projeto

A loja virtual é um sistema web que permite usuários autenticados criarem, editarem, visualizarem e deletarem produtos e fornecedores. Cada produto pode ser categorizado por tipo, inclui imagem e informações como nome, descrição, preço e quantidade disponível. Visitantes não autenticados podem navegar pelos produtos na área pública.

## Funcionalidades

- **Autenticação**: Registro, login e gerenciamento de contas de usuário
- **Gestão de Produtos**: CRUD completo com upload de imagem
- **Gestão de Fornecedores**: CRUD completo de fornecedores
- **Categorização**: Produtos organizados por tipo/categoria
- **Perfil de Usuário**: Edição de dados pessoais e gerenciamento de perfil
- **Dashboard**: Painel principal após autenticação
- **Interface Responsiva**: Desenvolvido com Tailwind CSS

## Tecnologias

- **Framework**: Laravel 12.0
- **PHP**: 8.2+
- **Frontend**: Blade Templates + Tailwind CSS + Vite
- **Database**: MySQL
- **Autenticação**: Laravel Breeze
- **Testes**: Pest PHP

## Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js (para build do frontend)
- MySQL

## Instalação

```bash
# Clone o repositório
git clone <link-do-repositorio>
cd lojavirtualads

# Instale dependências PHP
composer install

# Instale dependências Node.js
npm install

# Copie o arquivo de configuração
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Configure o banco de dados no arquivo .env
# DB_DATABASE=lojavirtual
# DB_USERNAME=root
# DB_PASSWORD=

# Execute as migrações do banco de dados
php artisan migrate

# Crie o link simbólico para o storage (necessário para exibir imagens)
php artisan storage:link

# Compile os assets frontend
npm run build
```

## Execução

```bash
# Inicie o servidor de desenvolvimento
php artisan serve

# Em outro terminal, compile os assets em tempo real (opcional)
npm run dev
```

A aplicação estará disponível em `http://localhost:8000`

## Estrutura do Projeto

- `app/Models/` - Modelos de dados (Product, Supplier, User, Type)
- `app/Http/Controllers/` - Controladores da aplicação
- `resources/views/` - Templates Blade
- `routes/` - Definição de rotas
- `database/migrations/` - Migrações do banco de dados
- `storage/app/public/products/` - Imagens dos produtos

## Rotas Principais

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/` | Área pública — listagem de produtos |
| GET | `/dashboard` | Dashboard (autenticado) |
| GET/POST | `/products/new` | Criar novo produto |
| GET | `/products` | Listar produtos |
| GET/POST | `/products/update/{id}` | Editar produto |
| GET | `/products/delete/{id}` | Deletar produto |
| GET/POST | `/suppliers/new` | Criar novo fornecedor |
| GET | `/suppliers` | Listar fornecedores |
| GET/POST | `/suppliers/update/{id}` | Editar fornecedor |
| GET | `/suppliers/delete/{id}` | Deletar fornecedor |
| GET | `/profile` | Editar perfil |

##

> [!NOTE]
> Este projeto foi desenvolvido para propósitos de aprendizado da faculdade.