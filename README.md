
## Visão Geral

**Nome**: CRUD-Auth

**Descrição**: Esta aplicação foi desenvolvida pensando em empresas que buscam um sistema de inventário que permita uma gestão personalizada dos itens de acordo com o nível de permissão concedido ao usuário. 

## Pré-requisitos

1. **Composer**
2. **PHP** Versão: >= 8.0
3. **Laravel** Versão: >=10
4. **Git**
5. **Node.js**
6. **Banco de dados MySQL**

## Como rodar
1. **Clonar o Repositório do GitHub e Selecionar Diretório**
   
   Abra o terminal e execute:

    ```sh
    git clone https://github.com/ranyesantos/CRUD-Auth.git
    ```

    Após clonar, para selecionar o diretório do projeto, execute:
    ```sh
    cd CRUD-Auth
    ```

2. **Instalar Dependências do PHP**

    No diretório do projeto, execute:
    ```sh
    composer install
    ```
    
3. **Configurar Variáveis de Ambiente**

    Copie o arquivo `.env.example` para `.env` com o comando:
    ```sh
    cp .env.example .env
    ```

    Edite o arquivo .env com suas configurações de banco de dados e outras variáveis de ambiente necessárias. Por exemplo:
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=seu_banco_de_dados
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```


4. **Gerar a Chave da Aplicação**

    Execute o comando para gerar a chave da aplicação:
    ```sh
    php artisan key:generate
    ```

5. **Execute Migrations e Seeders**

    Execute as migrations para criar as tabelas no banco de dados
    ```sh
    php artisan migrate
    ```

    Após executar as migrations, popule o banco de dados com o comando:
    ```sh
    php artisan db:seed
    ```
    
6. **Instalar Dependências e Executar Compilador JavaScript**

    Para instalar, execute o comando:
    ```sh
    npm install
    ```
    
    Após instalar, execute o seguinte comando para compilar os arquivos:
    ```sh
    npm run dev
    ```

7. **Iniciar o Servidor de Desenvolvimento**

    Para iniciar o servidor embutido do Laravel, execute o comando:
    ```sh
    php artisan serve
    ```

    O servidor estará disponível em `http://127.0.0.1:8000`

## Níveis de Permissões de Usuários
   
1. **Administrador**
   - **Permissões**: Acesso completo a todas as funcionalidades do sistema.

2. **Usuário Comum**
   - **Permissões**: Permissão para cadastrar e visualizar detalhes dos produtos.
   - **Restrições**: Edição e exclusão de items.
   - **Condição de Acesso**: Para ser um usuário comum, é necessário realizar o login no sistema.

3. **Visualizador**
   - **Permissões**: Visualização dos dados de inventário sem permissão para modificar informações.
   - **Condição de Acesso**: Os visualizadores são usuários que não estão logados no sistema.


## Funcionalidades Principais

1. **Gerenciamento de Inventário**
   
   - Adicione e edite informações sobre produtos, incluindo nome, descrição, preço e disponibilidade para venda.
    
2. **Segurança e Controle**
   - **Autenticação e Autorização**: Sistema de login seguro com autenticação e controle de acesso baseado em middlewares.
