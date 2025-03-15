# API Laravel Public

API RESTful simples para gerenciamento de clientes, construída com Laravel.

## 📋 Funcionalidades

- Gerenciamento completo de clientes (CRUD)
- Paginação de resultados
- Respostas em formato JSON
- Validação de dados de entrada

## 🚀 Tecnologias

- **PHP 8.2+** - Linguagem de programação
- **Laravel 11** - Framework PHP moderno
- **MySQL** - Banco de dados relacional
- **Docker** - Conteinerização via Laravel Sail
- **Composer** - Gerenciador de dependências PHP

## 📦 Instalação e Configuração

```bash
# Clone o repositório
git clone https://github.com/ItamarJuniorDEV/api-public-laravel.git
cd api-public-laravel

# Configure o ambiente com Laravel Sail (Docker)
cp .env.example .env
composer install
php artisan key:generate

# Inicie os contêineres Docker
./vendor/bin/sail up -d

# Execute as migrações
./vendor/bin/sail artisan migrate
```

## 🔄 Endpoints

| Método   | Endpoint                  | Descrição                          |
|----------|---------------------------|------------------------------------|
| `GET`    | `/api/status`             | Verifica status da API             |
| `GET`    | `/api/clients`            | Lista todos os clientes (paginado) |
| `GET`    | `/api/clients/{id}`       | Busca cliente por ID               |
| `POST`   | `/api/clients/search`     | Busca cliente por ID via body      |
| `POST`   | `/api/clients`            | Cria um novo cliente               |
| `PUT`    | `/api/clients/{id}`       | Atualiza dados de um cliente       |
| `DELETE` | `/api/clients/{id}`       | Exclui um cliente pelo ID          |

## 📦 Exemplos de Requisições

### Verificar status da API
```bash
GET /api/status
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "A API está rodando"
}
```

### Listar clientes
```bash
GET /api/clients
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "Clientes obtidos com sucesso",
  "data": {
    "current_page": 1,
    "data": [...],
    "total": 50
  }
}
```

### Buscar cliente por ID (via path)
```bash
GET /api/clients/101
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "Cliente encontrado com sucesso",
  "data": {
    "id": 101,
    "name": "Itamar Junior",
    "email": "junior@gmail.com",
    "created_at": "2025-03-15T21:59:05.000000Z",
    "updated_at": "2025-03-15T21:59:05.000000Z"
  }
}
```

### Buscar cliente por ID (via body)
```bash
POST /api/clients/search
Content-Type: application/json

{
  "id": 101
}
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "Cliente recuperado com sucesso",
  "data": {
    "id": 101,
    "name": "Itamar Junior",
    "email": "junior@gmail.com",
    "created_at": "2025-03-15T21:59:05.000000Z",
    "updated_at": "2025-03-15T21:59:05.000000Z"
  }
}
```

### Criar um cliente
```bash
POST /api/clients
Content-Type: application/json

{
  "name": "Itamar Junior",
  "email": "junior@gmail.com"
}
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "Cliente criado com sucesso",
  "data": {
    "id": 101,
    "name": "Itamar Junior",
    "email": "junior@gmail.com",
    "created_at": "2025-03-15T22:32:45.000000Z",
    "updated_at": "2025-03-15T22:32:45.000000Z"
  }
}
```

### Atualizar um cliente
```bash
PUT /api/clients/101
Content-Type: application/json

{
  "name": "Nome Atualizado",
  "email": "email.atualizado@exemplo.com"
}
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "O cliente foi atualizado",
  "data": {
    "id": 101,
    "name": "Nome Atualizado",
    "email": "email.atualizado@exemplo.com",
    "created_at": "2025-03-15T21:59:05.000000Z",
    "updated_at": "2025-03-15T22:35:10.000000Z"
  }
}
```

### Remover um cliente
```bash
DELETE /api/clients/101
```
**Resposta:**
```json
{
  "status": "ok",
  "message": "O cliente foi deletado"
}
```

## 💾 Modelos de Dados

### Cliente

| Campo      | Tipo     | Descrição                            |
|------------|---------|------------------------------------|
| `id`       | Integer | Identificador único               |
| `name`     | String  | Nome do cliente                   |
| `email`    | String  | Email do cliente (único)          |
| `created_at` | DateTime | Data de criação                 |
| `updated_at` | DateTime | Data da última atualização       |

## 🧪 Testes

```bash
# Execute os testes
./vendor/bin/sail artisan test
```

## 👨‍💻 Autor

Itamar Junior

## 📝 Licença

Este projeto está licenciado sob a licença MIT.
