<pre>
Web application that handles clients, orders and deliveries from MySql 
database and displays results in various tables.

Neccessary tools:
1. Laravel 9
2. PHP 8.0
3. MySql

Setup
after cloning project locally
1. <b>composer install</b>
2. <b>npm install</b>
3. create .env file and add info like in .env.example
4. in .env file configure database connection
5. run command <b>php artisan migrate:fresh --seed</b> (if you are not using your own DB)
6. run <b>php artisan serve</b>
7. open another terminal and run <b>npm run dev</b>
8. click on the hosting address that <b>php artisan serve</b> provided in terminal
9. click in the browser <b>generate api key</b>(upper right corner) and refresh page
</pre>
<pre> If you want to run this program with your own database, 
check if database table and column names match</pre>
