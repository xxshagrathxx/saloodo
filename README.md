# saloodo
This repo contains 3 projects (server, biker, sender)
To setup the environment first do the following on the server:

 1-composer update
 
 2-php artisan migrate:fresh --seed
 
 3-php artisan serve
 
 
 
 
The sender: 

  1- composer update
  
  2- edit the (app/config/global.php) file and put the server path, in our case its (http://127.0.0.1/)
  
  3- php artisan serve --port=8080 (any other port than the server's)
  
  
  
The Biker: 

  1- composer update
  
  2- edit the (app/config/global.php) file and put the server path, in our case its (http://127.0.0.1/)
  
  3- php artisan serve --port=8090 (any other port than the server's)
