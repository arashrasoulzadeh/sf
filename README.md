# running 
you can use `docker-compose up -d` to run the system as daemon.
as well update .env with following database info:
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

then install composer packages 

then generate the jwt key secret with `php artisan jwt:secret`

you should then seed the database with `php artisan db:seed`


# testing
to run tests simply execute 

`php vendor/bin/codecept run api`


# routes
Menu = `http://localhost:8080/api/food/menu`

order (auth*) = `http://localhost:8080/api/order/food`

Orders (auth*) = `http://localhost:8080/api/order/list`

Register = `http://localhost:8080/api/auth/register`

Login = `http://localhost:8080/api/auth/login`


`* login first then set authorization header for auth routes` 

insomnia rest client file available [here](insomnia.json)

# notes:
data was incorrect, so i changed the date of ingredients to match the date of test, also this test needed more time to performance-tune operation and write more tests



