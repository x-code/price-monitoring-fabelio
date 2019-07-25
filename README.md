
## Setting
1. Clone this project by running `git clone git@github.com:x-code/price-monitoring-fabelio.git` on terminal
2. Open edit `.env.example` to `.env` and edit the credentials of database
3. Generate app key by running `php artisan key:generate`
4. Running `php artisan migrate` to migrate table to database
5. Running `php artisan serve` and visit http://localhost:8000

## Feature
1. Import Fabelio.com product by insert link of it
2. List products
3. Detail product (title, image, type price, special price, old price, regular price, description)
4. Comment with upvote and downvote feature
