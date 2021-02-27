# Multi-Container Setup

This is a proof of concept. Running 4 containers all working together to allow abstraction of code.

Nginx - web server (Can use Apache)
PHP/Symfony - API (Can use Laravel or Python/Flask)
Nuxt/Vue - Client Site (Can use anything you want)
MariaDB - Database (Can use any DB)
#


# Installation

You need to have docker installed on your machine to create the local environment.

## Using the Makerfile

Navigate to ```LOCAL_WORKING/``` In terminal run ```make install```
Then visit [http://localhost:8080](http://localhost:8080/) url in your browser. And you will see the Nuxt application.


## If you don't use the Makerfile ???

From the terminal run
```
docker-compose up -d --build
```
Download and install composer packages:
```
docker-compose exec php composer install
```
Copy .env files
```
cp .env.api api/.env
cp .env.client client/.env
```
Restart
```
docker-compose restart client
```

# API, Client folders

These are the backend and frontend containers. Potentially depending on size of the project - these could be their own repository.

