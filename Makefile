migrate:
	docker-compose exec app php artisan migrate

migrate-rollback:
	docker-compose exec app php artisan migrate:rollback

clear-all:
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan view:clear
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan route:clear
