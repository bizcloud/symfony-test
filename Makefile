DOCKER_COMPOSE = docker-compose
EXEC           = $(DOCKER_COMPOSE) exec
EXEC_PHP       = $(DOCKER_COMPOSE) exec -T php
SYMFONY        = $(EXEC_PHP) bin/console
COMPOSER       = $(EXEC_PHP) composer

##
## Project
## -------
##

build:
	@$(DOCKER_COMPOSE) pull
	#@$(DOCKER_COMPOSE) pull --parallel --quiet --ignore-pull-failures 2> /dev/null
	$(DOCKER_COMPOSE) build --pull

##install: build start vendor db
install: build start vendor

start:
	$(DOCKER_COMPOSE) up --build --remove-orphans --force-recreate --detach

stop:
	$(DOCKER_COMPOSE) stop

kill:
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) down --volumes --remove-orphans

clean: kill
	rm -rf var vendor

reinstall: clean install

security:
	vendor/bin/security-checker security:check

reload:
	rm -rf var/cache/dev/* var/logs/dev/*
	bin/console cache:clear --env=dev
	bin/console doctrine:database:drop --force  --env=dev
	bin/console doctrine:database:create --env=dev
	bin/console doctrine:migrations:migrate --no-interaction --env=dev
	bin/console doctrine:fixtures:load --no-interaction --env=dev

.PHONY: build kill install reset start stop clean reinstall reload security

##
## Utils
## -----
##

db: ## Reset the database and load fixtures
db: vendor
	$(SYMFONY) doctrine:database:drop --if-exists --force
	$(SYMFONY) doctrine:database:create --if-not-exists
	$(SYMFONY) doctrine:migrations:migrate --no-interaction --allow-no-migration
	$(SYMFONY) doctrine:fixtures:load --no-interaction

migration: ## Generate a new doctrine migration
migration: vendor
	$(SYMFONY) doctrine:migrations:diff

db-validate-schema: ## Validate the doctrine ORM mapping
db-validate-schema: vendor
	$(SYMFONY) doctrine:schema:validate

.PHONY: db migration watch


# rules based on files

#composer.lock: composer.json
#	$(COMPOSER) update --lock --no-scripts --no-interaction

vendor:
	$(COMPOSER) install

.PHONY: vendor

