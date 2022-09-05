
## how to use

- cp .env.example .env (configure database data connect).
- composer install.
- php artisan key:generate.
- php artisan migrate.
- php artisan db:seed --class=UserSeeder
- php artisan serve.
- example: http://127.0.0.1:8000/api/fetch?location=buenos aires.

## endpoints

- http://127.0.0.1:8000/api/register
- http://127.0.0.1:8000/api/authenticate
- http://127.0.0.1:8000/api/authuser
- http://127.0.0.1:8000/api/fetch?location=[LOCATION]


## auth type

- Bearer Token

## test data

- user: admin@admin.com
- password: password
