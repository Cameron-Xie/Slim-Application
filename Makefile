DockerPHP=docker-compose exec -T php

up:
	@make create-dev-env
	@make start-containers

down:
	@make stop-containers

test:
	@make phpcs
	@make acceptance-test
	@make unit-test

start-containers:
	@docker-compose up --build -d
	@echo 'Composer install may take a few minutes at the first time.'

create-dev-env:
	@test -e .env || cp .env.example .env
	@test -e .app.env || cp .app.env.example .app.env
	@test -e .codecept.env || cp .codecept.env.example .codecept.env

stop-containers:
	@docker-compose down -v

phpcs:
	@${DockerPHP} vendor/bin/phpcs --standard=phpcs.xml ./src/ ./tests/acceptance/ ./tests/unit/

unit-test:
	@${DockerPHP} vendor/bin/codecept run unit

acceptance-test:
	@${DockerPHP} vendor/bin/codecept run acceptance
