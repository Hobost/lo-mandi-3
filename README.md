# lo-mandi-3
![AtsukoGrin](https://raw.githubusercontent.com/Hobost/lo-mandi-3/refs/heads/main/public/mandi.png)

## Info
aka Lomba Osu tapi Match at Night di Indonesia  
laravel uni project  
main focus is to showcase backend functionallity // mvc structure and laravel routing thingy (admin page is intentionally public so my lecturer can access it)  
frontend mostly uses bootstrap (for now) cause thats what we were taught, is not great (especially mobile view) but thats not the point (tight deadline ok)  
error handling may or may not be lacking, i did my best  
also not sure if everything of what im doing is correct but if it works it works innit  
if anyone finds this somehow dont bully

## Contributors
Me, The other Nathan, and Kennard :D

## Requirements
- PHP >= 8.1
- Composer
- Laravel >= 11.x
- MySQL
- osu account

## Installation
1. git clone
2. run `composer install`
3. copy .env.example and rename to .env
4. fill in client id secret callback url
5. run `php artisan key:generate`
6. make a new database with MySQL, make sure to match the name in .env
7. run `php artisan migrate`
8. run `php artisan serve`
