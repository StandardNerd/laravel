# Laravel Docker Container

Framework from https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose

Modified to use 
* PHP v7.4.12 with compatible libraries (gd, zip)
* Laravel v8.14.0
* PHPUnit
* SQLite3

## alias in ~/.zshrc
```
artisan() {
    docker-compose exec app php artisan $@
 }
 alias pspec="docker-compose exec app php ./vendor/bin/phpunit"
```

## Docker Cheatsheet
```docker-compose up -d```
```docker logs --tail 50 --follow --timestamps c7e55a34a70e```
```docker ps```

## execute commands inside Docker container
$ docker-compose exec app php ./vendor/bin/phpunit
$ docker-compose exec app php ./vendor/bin/phpunit tests/Feature/ProjectsTest.php
$ docker-compose exec db mysql -u root -p

## Laravel generators

```artisan make:controller ProjectController --resource --model=Project```


### Connect to DB Container
$ docker-compose exec db bash
$ mysql -u root -p

### Connect to App Container
$ docker-compose exec app bash
$ php --version
$ ./vendor/bin/phpunit --version
alias in ~/.bashrc: ```phpunit -v```

From host machine:

instead of `docker-compose exec app php artisan make:migration create_projects_table` use alias artisan e.g.:
```$ artisan make:migration create_projects_table```

### Known Issues
- ```CSRF token mismatch``` when running PHPUnit: ```artisan config:clear```



### References
https://laracasts.com/series/build-a-laravel-app-with-tdd/episodes/2?autoplay=true
https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose