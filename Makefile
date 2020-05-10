artisan-migrate:
	docker-compose exec app php artisan migrate

artisan-migrate-rollback:
	docker-compose exec app php artisan migrate
