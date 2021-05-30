<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Portfolio Laravel

# Table of content:
- [Portfolio Laravel](#portfolio-laravel)
- [Table of content:](#table-of-content)
  - [Introduction](#introduction)
  - [Requirements](#requirements)
  - [Installation](#installation)
  - [Technologies](#technologies)
  - [Start](#start)

## Introduction
Création de mon portfolio sur Laravel

## Requirements
- [PHP](https://www.php.net/downloads)
- [Node.JS](https://nodejs.org/en/download/)
- [Git](https://git-scm.com/download/)

## Installation
- On Github, go to the main page of the project
- Open a terminal, or git bash
- Replace the current working directory with the location where you want to clone it.
- Type ```git clone https://github.com/Grezor/Portfolio_v2.git ```
- Press on ```Entry```


## Technologies
```
  - php: ^7.4|^8.0
```
## Start

- Once the installation is complete, type **npm -i** in the terminal. Install the dependencies in the local node_modules
folder.
- entry to project
- Run ```composer install``` on your cmd or terminal
- Copy ```.env.example``` file to ```.env``` on the root folder. 
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
  By default, the username is root and you can leave the password field empty. (This is for Xampp)
  By default, the username is root and password is also root. (This is for Lamp)
- Run ```php artisan migrate```
- Run ```php artisan serve```
- ```
Starting Laravel development server: http://127.0.0.1:8000
[Thu Apr 15 21:30:12 2021] PHP 8.0.0 Development Server (http://127.0.0.1:8000) started
```

## Functionality
```in progress```
## Improvement
```in progress```
## Contribute
It's hard. It's always hard the first time you do something. Especially when you are collaborating, making mistakes
isn't a comfortable thing. We wanted to simplify the way new open-source contributors learn & contribute for the first
time.

Reading articles & watching tutorials can help, but what's better than actually doing the stuff in a practice
environment? This project aims at providing guidance & simplifying the way beginners make their first contribution. If
you are looking to make your first contribution, follow the steps below.

## Author
**Duplessi Geoffrey**


# LaraStan
Larastan is a static analysis command-line tool by Nuno Maduro built on top of PHPStan and focuses on finding errors in your Laravel code before running it

```sh
create file ./phpstan.neon.dist
```
```yml
includes:
    - ./vendor/nunomaduro/larastan/extension.neon

parameters:
    paths: 
        - app
    level: 8
    # ignoreErrors:
    checkMissingIterableValueType: false
```