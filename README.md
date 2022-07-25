# API SOLLUTI - BELCHIOR
Software Solluti - Por Carlos Belchior.

## Tecnologias
As tecnologias abaixo descritas foram utilizadas para desenvolver esse projeto
The following technologies are being used to make this project work.

- *Laravel 9.x*
- *MySQL (or MariaDB)*

## Módulos
Os módulos do projeto são:
- Lojas (CRUD)
- Produtos (CRUD)

## Configuração do projeto
Este é basicamente um projeto laravel. Para executar se faz necessário seguir os requisitos do framework. É EXTREMAMENTE recomendado que use docker para executar esta aplicação. Você pode instalr o Docker seguindo as instruções do link a seguir para [obter o docker](https://docs.docker.com/engine/install/).

As próximas sessões irão fornecer instruções de como configurar e executar a aplicação em um container Docker.

### Iniciando
Para configurar seu container docker execute o comando abaixo:

```bash
docker-compose up --build -d
```

Para acessar o container PHP do docker execute o comando abaixo:
```bash
docker-compose exec php /bin/bash
```

O container docker será executado com imagens nginx, mysql e PHP.

#### Arquivos de configuração
Faça uma cópia do arquivo `.env.example`para `.env` e informe as variaveis de configuração conforme informado na documentação do Laravel no link a [seguir](https://laravel.com/docs/9.x/configuration).

IMPORTANTE: As configurações de acesso padrões do banco de dados são:
- host: mysql
- database: default
- user: root
- password: admin

#### Instalando dependencias
Dentro do seu container PHP execute os comandos abaixo para instalar todas as dependencias do projeto:
```bash
composer install 
```

#### Gere a chave laravel

```bash
php artisan key:generate 
```

#### Executando as migrations
Entre no seu serviço PHP e execute as migrations para configurar seu banco de dados:

```bash
php artisan migrate
```

#### Executando as seeds
Caso deseje gerar dados ficticios para o banco de dados, execute:

```bash
php artisan db:seed
```

#### Executando testes
Na imagem PHP do seu container execute o comando abaixo para executar os testes do Laravel:

```bash
php artisan test
```

#### Parar a aplicação
Para parar de executar a aplicação e apagar seu container, execute o comando abaixo no terminal do seu sistema

```bash
docker-compose down -v
```

#### Configure as permissões de log
No terminal do seu sistema, permita o acesso a pasta de logs do Laravel:

```bash
sudo chmod o+w ./storage/ -R
```

#### Configurando o envio de e-mails
Para executar o corretamente a notificação por e-mail configure nos arquivos abaixo os dados informados:

No .env
```
MAIL_MAILER=smtp
MAIL_HOST=host_do_provedor_de_email
MAIL_PORT=587
MAIL_USERNAME=seu_email@provedor_de_email.com
MAIL_PASSWORD=senha_do_email
MAIL_ENCRYPTION=criptografia_do_provedor
MAIL_FROM_ADDRESS="email_do_remetente"
MAIL_FROM_NAME="${APP_NAME}"
```

#### No App\Http\Controllers\ProdutosController
#### Linha 38
#### Substitua seu_email@provedor.com pelo e-mail do destinatário 
```
Mail::to('seu_email@provedor.com')->send(new ProdutoMail($mailData));
```

## End-points

### Loja:

Para buscar as lojas:
```
Method: GET
URL: /api/lojas/index
```

Para criar uma nova loja:
```
Method: POST
URL: /api/lojas/store
Data body:
- 'nome' => 'required|min:3|max:40',
- 'email' => 'required|email|unique:App\Models\Loja,email'
```

Para atualizar uma loja:
```
Method: POST
URL: /api/lojas/update/ID_DO_CLIENTE
Data body:
- 'nome' => 'required|min:3|max:40',
- 'email' => 'required|email|unique:App\Models\Loja,email'
```

Para buscar uma loja especifica:
```
Method: GET
URL: /api/lojas/show/ID_DO_CLIENTE
```

Para excluir uma loja:
```
Method: GET
URL: /api/lojas/destroy/ID_DO_CLIENTE
```




### Produto:

Para buscar os produtos:
```
Method: GET
URL: /api/produtos/index
```

Para criar uma novo produto:
```
Method: POST
URL: /api/produtos/store
Data body:
- 'nome' => 'required|min:3|max:40',
- 'valor' => 'required|numeric|min:0.01|max:9999.99',
- 'loja_id' => 'required|exists:lojas,id',
- 'ativo' => 'required|boolean'
```

Para atualizar um produto:
```
Method: POST
URL: /api/produtos/update/ID_DO_CLIENTE
Data body:
- 'nome' => 'required|min:3|max:40',
- 'valor' => 'required|numeric|min:0.01|max:9999.99',
- 'loja_id' => 'required|exists:lojas,id',
- 'ativo' => 'required|boolean'
```

Para buscar um produto especifico:
```
Method: GET
URL: /api/produtos/show/ID_DO_PRODUTO
```

Para excluir um produto:
```
Method: GET
URL: /api/produtos/destroy/ID_DO_PRODUTO
```
