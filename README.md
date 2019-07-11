# movierama

### Installation
- Clone repository
- Open a terminal, go to the repo, run `docker-compose up -d`
- Run `docker-compose exec movierama_php composer install`
- Run `docker-compose exec movierama_php php artisan key:generate`
- Run `docker-compose exec movierama_php php artisan migrate`
- Run `docker-compose exec movierama_php php artisan db:seed` to get some initial data
- Run `cp .env.example .env`
- Add `127.0.0.1 movierama.local` to your hosts
- Open http://movierama.local:8500 to access the app

### Specs
- Users​ ​should​ ​be​ ​able​ ​to​ ​log​ ​into​ ​their​ ​account​ ​or​ ​sign​ ​up​ ​for​ ​a​ ​new​ ​one 
- Users​ ​should​ ​be​ ​able​ ​to​ ​add​ ​movies​ ​by​ ​completing​ ​a​ ​form.​ ​Movies​ persist ​and​ ​reference​ ​the​ ​user​ that​ ​submitted​ 
- Users​​ should​ ​be​​ able​ ​to​​ express​​ their​​ opinion​ ​for​​ any​ ​movie ​​by ​​either ​​ a​l​​ike​​​or​​a​​​hate​. 
- Users​ ​can​ ​vote​ ​only​ ​once​ ​for​ ​each​ ​movie​ ​and​ ​can​ ​change​ ​their​ ​vote​ ​at​ ​any​ ​time​ ​by switching​ ​to​ ​the​ ​opposite​ ​vote​ ​or​ ​by​ ​retracting​ ​their​ ​vote​ ​altogether.
- Users​ ​should​ ​not​ ​be​ ​able​ ​to​ ​vote​ ​for​ ​the​ ​movies​ ​they​ ​have​ ​submitted.
- Users​​ should​ ​be ​​able ​​to ​​view​ ​the​ ​list​ ​of​ ​movies​ ​and​​ sort​ ​them​ ​by​ ​number​ ​of​ l​​ikes​, number​ ​of​ ​​hates​​ ​or​ ​date​ ​added.​
- Users​ ​should​ ​be​ ​able​ ​to​ ​view​ ​all​ ​movies​ ​submitted​ ​by​ ​a​ ​specific​ ​user.
