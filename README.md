# Simple Blog

I have developed this simple blog project for learning and practicing Laravel7.

## Dependencies
1. docker >= 19.03
2. docker-compose >= 1.25

## Setup

Once copying source code of the application the simple command listed below up all docker containers:
```
docker-compose up -d --build
```

Now you can install all the dependencies of the application by running the following command:
```
make composer-install
```

Now you can install migrations by running the following command:
```
make migrate
```

If needed you can install seeders by running the following command:
```
make seed
```

Before using MinIO storage provider you need to configure it by executing next commands:
```
./mc mb local/blog
./mc policy set public local/blog
```

Since the project uses laravel/passport package you need to execute next command:
```
php artisan passport:install
```

## Testing
To run tests you need to run the following command:
```
make test
```
