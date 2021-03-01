# Multi-Container Setup

This is a proof of concept. Running 4 containers all working together to allow abstraction of code.

Nginx - web server (Can use Apache)
PHP/Symfony - API (Can use Laravel or Python/Flask)
Nuxt/Vue - Client Site (Can use anything you want)
MariaDB - Database (Can use any DB)

# Installation

You need to have docker installed on your machine to create the local environment.

## Using the Makerfile

Navigate to ```LOCAL_WORKING/``` In terminal run ```make install```

Then visit [http://localhost:8081/homepage](http://localhost:8081/homepage) url in your browser - if the installer ran correctly it should show:
```
Saved new homepage with id 1
```
This essentially is just storing a very basic homepage entity in the database - to be fetched from the front-end app. (testing purposes)...

Also for testing purposes if you visit [http://localhost:8081/api](http://localhost:8081/api) - You will see our endpoints and documentation for our API.

Then visit [http://localhost:8080](http://localhost:8080/) url in your browser. And you will see the Nuxt application. (Front end container)
This is just the boilerplate that comes with Nuxt - but if you use vue dev tools - And go to
```
<Vapp> -> <Vmain> -> <Nuxt> -> <PagesIndex>
```
You will see our homepage object fetched via axios and the endpoint ```'/api/homepages/1'```

# API, Client folders

These are the backend and frontend containers. Potentially depending on size of the project - these could be their own repository.

