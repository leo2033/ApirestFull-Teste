# API RESTful Laravel

API RESTful desenvolvida com PHP e Laravel, utilizando autenticação JWT e banco de dados MySQL.

## Requisitos

- PHP 8.2 ou superior
- Composer
- MySQL
- Laravel 11

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/api-rest-laravel.git
cd api-rest-laravel
```

2. Instale as dependências:
```bash
composer install
```

3. Configure o arquivo .env:
```bash
cp .env.example .env
```

4. Configure as variáveis de ambiente no arquivo .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

JWT_SECRET=sua_chave_secreta_jwt
```

5. Gere a chave da aplicação:
```bash
php artisan key:generate
```

6. Gere a chave secreta JWT:
```bash
php artisan jwt:secret
```

7. Execute as migrações:
```bash
php artisan migrate
```

8. (Opcional) Execute os seeders para popular o banco de dados:
```bash
php artisan db:seed
```

9. Inicie o servidor:
```bash
php artisan serve
```

## Documentação da API

A API está documentada utilizando Swagger. Para acessar a documentação, inicie o servidor e acesse:

```
http://localhost:8000/api/documentation
```

### Endpoints Disponíveis

#### Autenticação

- `POST /api/auth/register` - Registra um novo usuário
- `POST /api/auth/login` - Realiza login e retorna um token JWT
- `POST /api/auth/logout` - Realiza logout (invalidando o token)
- `GET /api/auth/me` - Retorna informações do usuário autenticado

#### Produtos

- `GET /api/products` - Lista todos os produtos (paginado)
- `GET /api/products/{id}` - Exibe um produto específico

## Autenticação

A API utiliza autenticação JWT (JSON Web Token). Para acessar endpoints protegidos, é necessário incluir o token no cabeçalho da requisição:

```
Authorization: Bearer {seu_token_jwt}
```

## Testes

Para executar os testes:

```bash
php artisan test
```

ou

```bash
vendor/bin/phpunit
```

## Estrutura do Projeto

- `app/Http/Controllers` - Controladores da API
- `app/Models` - Modelos do Eloquent
- `config/jwt.php` - Configurações do JWT
- `routes/api.php` - Rotas da API
- `tests/Feature` - Testes de integração

## Tecnologias Utilizadas

- PHP 8.2
- Laravel 11
- JWT (JSON Web Token)
- MySQL
- Swagger (para documentação)
