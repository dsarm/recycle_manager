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
2. create database
3. cp .env.example .env
4. set *DB_DATABASE*, *DB_USERNAME* & *DB_PASSWORD* in .env
5. composer install
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed
9. yourdomain.com/home
10. username: *admin@example.com* | password: *recycle*
11. Setup your *Google Maps API Key* and *Center location* in Settings page
12. Create recycles
13. View map
14. Done.