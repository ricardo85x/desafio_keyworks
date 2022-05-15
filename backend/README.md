# Instalação

Instale o docker-compose

entre no diretório do projeto

copie o arquivo src/.env.example para src/.env e atualize os dados se necessario

``cp src/.env.example src/.env``

copie o arquivo .env para raiz, para o docker pegar os dados do banco

``cp src/.env .env``

Crie o container

``docker-compose up -d --build``

Conecte no servidor 

``docker-compose exec php-apache /bin/bash``

Instale as dependencias

``composer install``

Rode as migrations

``php artisan migrate``

Para cadastrar os dados iniciais rode o comando
``php artisan db:seed --class=TaskSeeder``

Documentação

``http://localhost:3005/docs``

Caso utilize outra porta edite a linha 35 do arquivo:
``src/resources/scribe/index.blade.php``


