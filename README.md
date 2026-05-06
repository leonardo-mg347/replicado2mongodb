Classes PHP que consome dados do Replicado USP e cria coleções úteis no mongodb.

Imagem php:

    docker build --no-cache -t replicado2mongodb .

Subir ambiente:

    docker compose up 
    cp .env.example .env

Interface web para mongodb (usuário admin e senha admin):

    http://127.0.0.1:8081/


# Criando uma coleção:

1 - Criar a query em resources/queries

2 - Na pasta Collections criar sua collection, exemplo: defesasCollection.php

Rodar todas collections:

    docker exec -it replicado2mongodb php bin/sync.php


    

Dica: https://www.mongodb.com/try/download/compass
Conexão: mongodb://root:replicado2mongodb@localhost:27017/










