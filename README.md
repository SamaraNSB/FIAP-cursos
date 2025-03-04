# Sistema de gerenciamento - FIAP Cursos

Projeto em Laravel para gerenciamento de cursos, turmas e matrículas. Permite o cadastro, edição, listagem e exclusão de Alunos, Turmas e Matrículas, além de autenticação de usuários.

## Requisitos

- **PHP** >= 7.4 (recomendado PHP 8 ou superior)
- **Composer** (para gerenciar as dependências do PHP)
- **MySQL** ou outro banco compatível com Laravel (MySQL, MariaDB, etc.)
- **Node.js** >= 18 (recomendado), para rodar o Vite e compilar os assets
- **npm** ou **Yarn** (npm é instalado junto com o Node)

## Instalação

1. **Clonar o repositório**:
    
    ```
    git clone https://github.com/SuaConta/gerenciamento-de-cursos-FIAP.git
    cd gerenciamento-de-cursos-FIAP
    ```
    
2. **Instalar as dependências do PHP**:
    
    ```
    composer install
    ```
    
3. **Instalar as dependências do Node**:
    
    ```
    npm install
    ```
    
    ou, se preferir, `yarn install`.
    
4. **Copiar o arquivo de exemplo `.env.example` para `.env`**:
    
    ```
    cp .env.example .env
    ```
    
    Abra o `.env` e configure suas credenciais de banco de dados (DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.).
    
5. **Gerar a key da aplicação**:
    
    ```
    php artisan key:generate
    ```
    
6. **Rodar as migrations** para criar as tabelas:
    
    ```
    php artisan migrate
    ```
    
7. **Compilar os assets** (CSS/JS) em modo de desenvolvimento:
    
    ```
    npm run dev
    ```
    
8. **Iniciar o servidor de desenvolvimento**:
    
    ```
    php artisan serve
    ```
    
    Acesse [http://127.0.0.1:8000](http://127.0.0.1:8000/) no navegador para ver o projeto.
    

## Uso

- **Gerenciar Alunos**: Clique em “Alunos” no menu ou acesse `/alunos`.
- **Gerenciar Turmas**: Clique em “Turmas” ou acesse `/turmas`.
- **Matrículas**: Acesse `/matriculas` para criar e visualizar matrículas.

## Estrutura de Pastas Importantes

- `app/Models/` — Modelos Eloquent (Aluno, Turma, Matricula, User, etc.)
- `app/Http/Controllers/` — Lógica de controle das entidades
- `database/migrations/` — Arquivos de migração para criar as tabelas
- `resources/views/` — Views Blade (layouts, páginas de alunos, turmas, etc.)
- `resources/sass/` e `resources/js/` — Arquivos de estilo e scripts (compilados pelo Vite)

## Problemas Comuns

- **Tela em branco**: Verifique se `APP_DEBUG=true` no `.env`. Cheque `storage/logs/laravel.log` para ver mensagens de erro.
- **Falha na compilação do front-end**: Confirme se está rodando `npm run dev` e se o layout Blade tem `@vite(['resources/css/app.css','resources/js/app.js'])`.
- **Erro de banco de dados**: Confirme se as credenciais do `.env` estão corretas e se o MySQL está rodando.
