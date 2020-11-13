# Laravel Docker Container

https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose

## Docker Cheatsheet

```docker logs --tail 50 --follow --timestamps c7e55a34a70e```

### Connect to DB Container
$ docker-compose exec db bash
$ mysql -u root -p

### Connect to App Container
$ docker-compose exec app bash
$ php --version
$ ./vendor/bin/phpunit --version
alias in ~/.bashrc: ```phpunit -v```