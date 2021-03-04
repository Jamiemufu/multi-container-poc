# Multi-Container Setup

This is a proof of concept. Running 4 containers all working together to allow abstraction of code.

Nginx - web server (Can use Apache)
PHP/Symfony - API (Can use Laravel or Python/Flask)
Nuxt/Vue - Client Site (Can use anything you want)
MariaDB - Database (Can use any DB)

# Installation

You need to have docker installed on your machine to create the local environment.

## Using the Makerfile

Navigate to ```LOCAL_WORKING/``` In terminal run ```make install-local```

## Installing in PROD

Navigate to ```LOCAL_WORKING/``` In terminal run ```make install-prod```

## What's the difference?

```make install-local``` will run docker-compose with an additional override docker-compose file. This will expose ports [81, 3306]. In production these ports will not be accessible.

This allows the developer locally - to see API documentation and access API Platform UI via [http://localhost:81/api](http://localhost:81/api)

Then visit [http://localhost](http://localhost) url in your browser. And you will see the Nuxt application. (Front end container)
This is just the boilerplate that comes with Nuxt. the index of the nuxt application will send a post request off to the API saving a homepage - so we can test that its working. If you click the 
'check homepage' button - you will be forwarded onto a page which is just spitting out the homepages retreived from the API.

# API, Client folders

These are the backend and frontend containers. Potentially depending on size of the project - these could be their own repository.

