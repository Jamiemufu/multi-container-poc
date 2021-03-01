#-----------------------------------------------------------
# Docker
#-----------------------------------------------------------

# Wake up docker containers
up:
	docker-compose up -d

# Shut down docker containers
down:
	docker-compose down

# Show a status of each container
status:
	docker-compose ps

# Status alias
s: status

# Show logs of each container
logs:
	docker-compose logs

# Restart all containers
restart: down up

# Restart the client container
restart-client:
	docker-compose restart client

# Restart the client container alias
rc: restart-client

# Show the client logs
logs-client:
	docker-compose logs client

# Show the client logs alias
lc: logs-client

# Build and up docker containers
build:
	docker-compose up -d --build

# Build containers with no cache option
build-no-cache:
	docker-compose build --no-cache

# Build and up docker containers
rebuild: down build

# Run terminal of the php container
php:
	docker-compose exec php bash

# Run terminal of the client container
client:
	docker-compose exec client /bin/sh

#-----------------------------------------------------------
# Logs
#-----------------------------------------------------------

# Clear file-based logs
logs-clear:
	sudo rm docker/dev/nginx/logs/*.log
	sudo rm docker/dev/supervisor/logs/*.log
	sudo rm api/storage/logs/*.log

#-----------------------------------------------------------
# Testing
#-----------------------------------------------------------

# Run phpunit tests
test:
	docker-compose exec php vendor/bin/phpunit --order-by=defects --stop-on-defect

# Run all tests ignoring failures.
test-all:
	docker-compose exec php vendor/bin/phpunit --order-by=defects

# Run phpunit tests with coverage
coverage:
	docker-compose exec php vendor/bin/phpunit --coverage-html tests/report

#-----------------------------------------------------------
# Dependencies
#-----------------------------------------------------------

# Install composer dependencies
composer-install:
	docker-compose exec php composer install

# Update composer dependencies
composer-update:
	docker-compose exec php composer update

# Update yarn dependencies
yarn-update:
	docker-compose exec client yarn update

# Update all dependencies
dependencies-update: composer-update yarn-update

# Show composer outdated dependencies
composer-outdated:
	docker-compose exec yarn outdated

# Show yarn outdated dependencies
yarn-outdated:
	docker-compose exec yarn outdated

# Show all outdated dependencies
outdated: yarn-update composer-outdated

#-----------------------------------------------------------
# API Platform stuff...
#-----------------------------------------------------------

platform-schema:
	docker-compose exec php php bin/console doctrine:database:create
	docker-compose exec php php bin/console doctrine:schema:create

#-----------------------------------------------------------
# Databases
#-----------------------------------------------------------

migrate:
	docker-compose exec php php bin/console doctrine:migrations:migrate

#-----------------------------------------------------------
# Installation
#-----------------------------------------------------------

# Copy the Symfony API environment file
env-api:
	cp ../.env.api ../api/.env

# Copy the NuxtJS environment file
env-client:
	cp ../.env.client ../client/.env
# PHP composer autoload command
autoload:
	docker-compose exec php composer dump-autoload

# Install the environment
install: build env-api env-client composer-install platform-schema migrate rc


#-----------------------------------------------------------
# Git commands
#-----------------------------------------------------------

# Undo the last commit
git-undo:
	git reset --soft HEAD~1

# Make a Work In Progress commit
git-wip:
	git add .
	git commit -m "WIP"

# Export the codebase as app.zip archive
git-export:
	git archive --format zip --output app.zip master

#-----------------------------------------------------------
# Clearing
#-----------------------------------------------------------

# Shut down and remove all volumes
remove-volumes:
	docker-compose down --volumes

# Remove all existing networks (useful if network already exists with the same attributes)
prune-networks:
	docker network prune
