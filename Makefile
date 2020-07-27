migrate:
	docker-compose exec app php artisan migrate

migrate-rollback:
	docker-compose exec app php artisan migrate:rollback

clear-all:
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan view:clear
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan route:clear

fresh:
	docker-compose exec app php artisan migrate:fresh --seed

seed:
	docker-compose exec app php artisan db:seed

composer-install:
	docker-compose exec app composer install

test:
	docker-compose exec app php artisan test
