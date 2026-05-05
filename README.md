Classes PHP que consome dados do Replicado USP e cria coleções uteis no mongodb.

Imagem php:

    docker build --no-cache -t replicado2mongo .

Subir ambiente:

    docker compose up 

    cp .env.example .env

docker exec -u root -it replicado2mongo php bin/sync.php




http://127.0.0.1:8081/





