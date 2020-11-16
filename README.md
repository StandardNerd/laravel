# Laravel Docker Container

Framework from https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose

Modified to use
* PHP v7.4.12 with compatible libraries (gd, zip)
* Laravel v8.14.0
* PHPUnit
* SQLite3

## alias in ~/.zshrc

```bash
artisan() {
    docker-compose exec app php artisan $@
}
dce() {
docker-compose exec $@
}
alias pspec="docker-compose exec app php ./vendor/bin/phpunit"
```

## Docker Cheatsheet
`docker-compose up -d`
`docker logs --tail 50 --follow --timestamps c7e55a34a70e`
`docker ps`

## execute commands inside Docker container
$ docker-compose exec app php ./vendor/bin/phpunit
$ docker-compose exec app php ./vendor/bin/phpunit tests/Feature/ProjectsTest.php
$ docker-compose exec db mysql -u root -p

## Laravel generators using Artisan
`artisan make:migration create_projects_table`
`artisan migrate`
`artisan make:controller ProjectController --resource --model=Project`
`artisan tinker`
```bash
App\Models\Project::create(['title'=>'foo', 'description'=>'bar']);
=> App\Models\Project {#4180
     title: "foo",
     description: "bar",
     updated_at: "2020-11-16 15:14:34",
     created_at: "2020-11-16 15:14:34",
     id: 1,
   }
App\Models\Project::find(1);
App\Models\Project::all();
```

### Connect to DB Container
`$ docker-compose exec db bash`
`$ mysql -u root -p`

### Connect to App Container
`$ docker-compose exec app bash`
`$ php --version`
`$ ./vendor/bin/phpunit --version`
alias in ~/.bashrc: `phpunit -v`

### Known Issues
- `CSRF token mismatch` when running PHPUnit. Solution: `artisan config:clear`



### References
https://laracasts.com/series/build-a-laravel-app-with-tdd/episodes/2?autoplay=true
https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose