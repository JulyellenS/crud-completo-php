# Sistema de Controle Financeiro Pessoal

Este é um sistema de controle financeiro pessoal desenvolvido em PHP, com Composer, HTML, CSS e PostgreSQL. O sistema permite gerenciar transações financeiras, como receitas e despesas, categorizando e armazenando as informações no banco de dados.

## Funcionalidades

- Gerenciamento de transações financeiras (inclusão, listagem, edição e exclusão).
- Categorização das transações (por exemplo: alimentação, transporte, salário).
- Relatórios financeiros e visualização de saldo.

## Estrutura de Pastas

    crud-completo-php/
    │
    ├── /app
    │   ├── /control            # Controladores que gerenciam as interações do usuário
    │   ├── /model              # Modelos que representam as entidades do banco de dados
    │   ├── /repository         # Repositórios responsáveis pela persistência de dados
    │   ├── /service            # Serviços que implementam a lógica de negócios
    │   ├── /html               # Arquivos de interface, como formulários e listagens
    │   ├── /config             # Arquivos de configuração, como conexão com o banco de dados
    │   └── /css                # Arquivos de estilo (CSS)
    ├── /vendor                 # Dependências gerenciadas pelo Composer
    ├── .htaccess               # Configuração do Apache
    ├── .gitignore              # Arquivos e diretórios ignorados pelo Git
    ├── composer.json           # Configurações e dependências do Composer
    ├── composer.lock           # Registro das versões exatas das dependências instaladas
    └── index.php               # Ponto de entrada principal da aplicação

Requisitos

    PHP 7.4 ou superior
    PostgreSQL
    Composer

Instalação

    1. Clone o repositório:
          git clone https://github.com/JulyellenS/crud-completo-php.git

    2. Navegue até o diretório do projeto:
          cd crud-completo-php

    3. Instale as dependências do Composer:
          composer install

    4. Crie o banco de dados: Crie um banco de dados PostgreSQL com o nome controle_financeiro ou um nome de sua escolha.

    5. Configure as variáveis de ambiente: Crie um arquivo .env na pasta /app/config com o seguinte conteúdo:
          env
              DB_HOST=localhost
              DB_PORT=5432
              DB_DATABASE=controle_financeiro
              DB_USERNAME=seu_usuario
              DB_PASSWORD=sua_senha

    6. Execute as migrações: Importe o script SQL com as tabelas necessárias para o banco de dados. (Adicione um arquivo SQL na pasta database e inclua as instruções aqui se necessário).

    7. Configure o servidor Apache: Configure o Apache para apontar para o diretório crud-completo-php como raiz do documento.

Uso

    Acesse o sistema em http://localhost/crud-completo-php
    Utilize o menu de navegação para gerenciar transações e visualizar relatórios.

Contribuição

Se deseja contribuir com o projeto, siga os passos abaixo:

    1. Faça um fork do repositório.
    2. Crie uma nova branch com a sua feature ou correção: git checkout -b minha-feature.
    3. Commit suas alterações: git commit -m 'Adiciona nova feature'.
    4. Faça um push para a branch: git push origin minha-feature.
    5. Abra um Pull Request.






