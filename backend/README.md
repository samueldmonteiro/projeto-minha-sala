# Minha Sala API 📚

<img src="https://i.ibb.co/mXyVWDP/Whats-App-Image-2024-09-17-at-17-14-56.jpg" alt="Project Logo" width="150"/>

## 🚀 Sobre o Projeto

**Minha Sala API** é uma API RESTful desenvolvida para facilitar o acesso dos alunos da **Anhanguera Educacional** às informações de suas aulas e horários. Através desta ferramenta, os estudantes podem consultar seus horários de aula de forma intuitiva, automatizada e rápida, sem complicações.

---

## 🛠️ Tecnologias Utilizadas

- **PHP 8.2**
- **Laravel 11** (framework php)
- **JWT (JSON Web Token)** (token de autenticação)
- **MariaDB** (banco de dados relacional)
- **Redis** (cache)
  
## 🔑 Autenticação e Controle de Acesso

A API utiliza **JWT** para autenticação, garantindo segurança na comunicação. O sistema possui controle de acesso para diferentes perfis de usuários:
- **Admin**: Acesso completo a todas as funcionalidades.
- **Estudante**: Acesso restrito às informações pessoais e de aulas.

---

## 📋 Funcionalidades

- **Cadastro e Login de Usuário**: Os usuários devem se cadastrar para ter acesso às funcionalidades.
- **Obter Informações Sobre a(s) Aula(s) do Dia**: Os alunos podem visualizar seus horários de aula de maneira simples.
- **Selecionar Dia da Aula**: O aluno pode selecionar uma dia específico e visualizar todas as informações da(s) aula(s).
- **Acesso Restrito por Perfil**: Cada tipo de usuário tem permissões diferentes dentro da API.

---

## 📝 Pré-requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

- [PHP 8.2](https://www.php.net/releases/8.2/en.php)
- [Composer 2.7](https://getcomposer.org/)
- [MariaDB 10.6](https://mariadb.org/)
- [Laravel 11](https://laravel.com/)
- [Redis 6.0](https://redis.io/)

---

## 🚀 Como Rodar o Projeto

1. Clone este repositório:
    ```bash
    git clone https://github.com/seu-usuario/minha-sala-api.git
    ```

2. Entre no diretório do projeto:
    ```bash
    cd minha-sala-api
    ```

3. Instale as dependências:
    ```bash
    composer install
    ```

4. Configure o arquivo `.env` com as informações de banco de dados e JWT:
    ```bash
    cp .env.example .env
    ```
    
5. Configure o acesso à base de dados no arquivo `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE="minha-sala"
   DB_USERNAME=seu_usuario
   DB_PASSWORD="sua_senha"
   ```

6. Configure também o acesso ao Redis no arquivo `.env`:
   ```
   REDIS_CLIENT=predis
   REDIS_HOST=127.0.0.1
   REDIS_PASSWORD=null
   REDIS_PORT=6379
   ```

7. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```

8. Gere a chave JWT:
    ```bash
    php artisan jwt:secret
    ```
    
6. Execute as migrações para criar as tabelas do banco de dados:
    ```bash
    php artisan migrate --seed
    ```

7. Inicie o servidor:
    ```bash
    php artisan serve
    ```

---

## 🔐 Autenticação JWT

Para usar a API, você precisará de um token JWT. Siga os passos abaixo:

1. Faça login usando as credenciais de um aluno:
    - Endpoint: `POST /api/v1/auth/login/student`
    - Corpo da requisição:
    ```json
    {
      "email": "user@example.com",
      "password": "password123"
    }
    ```

2. Use o token JWT gerado nas requisições subsequentes, passando-o no cabeçalho de autenticação:
    ```bash
    Authorization: Bearer <seu-token-jwt>
    ```

---

## 📚 Documentação da API

A API possui os seguintes endpoints principais:

1. Ping
- `GET /api/v1/ping` — Testar API.
  
2. Autenticação
- `POST /api/v1/auth/login/student` — Autenticar Aluno.
- `POST /api/v1/auth/login/admin` — Autenticar Admin.
- `GET /api/v1/auth/me` — Obter Usuário Autênticado.
- `GET /api/v1/auth/logout` — Deslogar Usuário.

2. Informações de Aula (Somente Usuários Autenticados)
- `GET /api/v1/class_informations/today` — Obter horário(s) de aula(s).

Para uma lista completa de endpoints, verifique o arquivo de rotas em `routes/api.php`.

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

## 🧑‍💻 Contribuições

Contribuições são sempre bem-vindas! Sinta-se à vontade para enviar pull requests e sugestões para melhorar o projeto.

---

## 📞 Contato

Caso tenha dúvidas ou precise de suporte, entre em contato pelo email: `samuel.dvmonteiro@gmail.com`.

---

**Desenvolvido com ❤️ por Equipe Minha Sala**
