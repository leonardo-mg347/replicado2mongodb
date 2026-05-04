Classes PHP que consome dados do Replicado USP e cria coleções uteis no mongodbmkdir cursolaravel



docker build --no-cache -t replicado2mongo .
docker compose up 

docker exec -u root -it replicado2mongo php bin/sync.php

DB_CONNECTION=mariadb
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=cursolaravel
DB_USERNAME=cursolaravel
DB_PASSWORD=cursolaravel


cp .env.example .env

docker exec -u root -it cursolaravel php artisan migrate

http://127.0.0.1:8000/



docker exec -u root -it cursolaravel composer require --dev laravel/dusk
docker exec -u root -it cursolaravel php artisan dusk:install
docker exec -u root -it cursolaravel php artisan dusk:chrome-driver



APP_URL=http://cursolaravel
DUSK_DRIVER_URL='http://selenium:4444/wd/hub'
DUSK_START_MAXIMIZED=true
DUSK_HEADLESS_DISABLED=true

docker exec -u root -it cursolaravel php artisan dusk


docker exec -u root -it cursolaravel php artisan dusk:make VerPaginaTest

docker rm -f $(docker ps -aq)

