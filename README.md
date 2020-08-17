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
then generate the jwt key secret with `php artisan jwt:secret`



# testing
to run tests simply execute 

`php vendor/bin/codecept bootstrap`
