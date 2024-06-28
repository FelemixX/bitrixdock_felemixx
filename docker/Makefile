include ./docker/.env

.DEFAULT_GOAL := help

help: ## This help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

console-php: ## Run bash (PHP) from "www-data"
	docker-compose exec -u www-data php bash

console-php-root: ## Run bash (PHP) from "root"
	docker-compose exec -u root php bash

console-mysql: ## Log in to the MySQL console from default user
	docker-compose exec db mysql -u $(MYSQL_USER) --password=$(MYSQL_PASSWORD) -A $(MYSQL_DATABASE)

console-mysql-root: ## Log in to the MySQL console from "root"
	docker-compose exec db mysql -u root --password=$(MYSQL_ROOT_PASSWORD) -A $(MYSQL_DATABASE)

up: ## Up Docker-project
	docker-compose up -d

down: ## Down Docker-project
	docker-compose down --remove-orphans

stop: ## Stop Docker-project
	docker-compose stop

build: ## Build Docker-project
	docker-compose build --no-cache

ps: ## Show list containers
	docker-compose ps

bitrix-setup: create-dir ## Download bitrixsetup.php file to the site path
	curl -fsSL http://www.1c-bitrix.ru/download/scripts/bitrixsetup.php -o ${SITE_PATH}/bitrixsetup.php
	make perm


bitrix-restore: create-dir ## Download restore.php file to the site path
	curl -fsSL http://www.1c-bitrix.ru/download/scripts/restore.php -o ${SITE_PATH}/restore.php
	make perm

bitrix-server-test: create-dir ## Download bitrix_server_test.php file to the site path
	curl -fsSL https://dev.1c-bitrix.ru/download/scripts/bitrix_server_test.php -o ${SITE_PATH}/bitrix_server_test.php
	make perm

create-dir: ## Create site path
	mkdir -p ${SITE_PATH}
	make perm

perm:
	sudo chown -R root:www-data ${SITE_PATH}
	sudo chmod -R 775 ${SITE_PATH}
default: help
