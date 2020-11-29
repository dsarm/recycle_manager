## Recycle Manager - Description:

This aplication is a Recycle Manager.  
It allows administrators to manage (create, read, update, remove) and show to non-authenticated users recycle points locations using a Google Map.  
   

## Recycle Manager - Recycle location information:  

Types (glass, plastic, paper, organic, etc);  
Sizes;  
Country, city and address;  
Coordinates;  
Name;  
  

## Recycle Manager - Functionalities:  

Create, Edit and Remove Recycle points;  
Show on a Google Map markers of the recycle points;  
Recycle location markers information window with additional information.  
  

## Recycle Manager - Instalation and First use:  

1. git clone
2. create database *recycle_manager*
3. cp .env.example .env
4. nano .env
5. set DB_USERNAME & DB_PASSWORD
6. composer install
7. php artisan key:generate
8. php artisan migrate
9. php artisan db:seed
10. Use browser to navigato to yourdomain.com/home
11. username: *admin@example.com* | password: *recycle*
12. Edit settings, *Center location* and *Google Maps API Key*
13. Create recycles
14. Done.