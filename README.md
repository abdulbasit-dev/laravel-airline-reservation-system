
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Larevel Airline Reservation System
 - User can search for flights and book it.
 - admin in dahboard mange the flights, airlines, airports ... 
## Demo 
 - Dashbaord 
 <img src="./public/assets/images/demos/dashboard.jpg" alt="dashboard">
 - Flights 
 <img src="./public/assets/images/demos/flights.jpg" alt="flights" >
 - Airlins 
 <img src="./public/assets/images/demos/airlines.jpg" alt="airlines" >

 -   [Live Preview](http://laravel-airline.herokuapp.com/public/)


## Installation

1. clone the project `git clone https://github.com/abdulbasit-dev/laravel-airline-reservation-system.git`
2. create a file with name .env `touch .env`
3. copy content of .env.example to .env
4. set up your database connection in .env
5. run `composer install`
6. generate app key `php artisan key:generate`
7. run `php artisan migrate --seed` (note --seed will fill the database with dummy data)
8.  your are good to go 😊

## Usefull Commands

- create controller with its related model + resourse functions <br/>
    `cntrl UserController --model=User -r` for normal controller <br/>
    `cntrl UserController --model=User --api` for normal api controller

## Laravel Artisan Command Shourtcut In Git Bash

if u are using windows go to this path "C:\Program Files\Git\etc", in there open "bash.bashrc" file 
copy content of this gist
[abdulbasit-dev/bash.bashrc](https://gist.github.com/abdulbasit-dev/d13ff13fb4700995de97a4b88a626753)
and put it into your "C:\Program Files\Git\etc\bash.bashrc" file 

update.fix


