#!/bin/bash

echo "Inicializa os containers"
docker-compose up -d --build

echo "Copia o .env"
docker exec ot-backend-php-fpm cp .env.example .env

echo "Instala os pacotes"
docker exec ot-backend-php-fpm composer install

echo "Gera chave da aplicação"
docker exec ot-backend-php-fpm php artisan key:generate

echo "Executa as migrações de banco de dados"
docker exec ot-backend-php-fpm php artisan migrate:fresh --seed
