# movierama

### Installation
- Clone repository
- Open a terminal, go to the repo, run `docker-compose up -d`
- Run `docker-compose php composer install`
- Run `docker-compose php php artisan key:generate`
- Run `docker-compose php php artisan key:migrate`
- Run `cp .env.example .env`
- Add `127.0.0.1 movierama.local` to your hosts
- Open http://movierama.local:8500 to access the app


### Specs
- User::login (public)
- User::register (public)
- User::movies (public)
- User::addMovie (private)
- User::movie::like (private)
- User::movie::hate (private)
