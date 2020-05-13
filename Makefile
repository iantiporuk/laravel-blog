artisan-migrate:
	docker-compose exec app php artisan migrate

artisan-migrate-rollback:
	docker-compose exec app php artisan migrate

clear-all:
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan view:clear
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan route:clear
