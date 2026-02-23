# dev =========================================================================
clear:
	php artisan optimize:clear

build:
	php artisan optimize:clear
	php artisan optimize

fmt:
	./vendor/bin/php-cs-fixer fix

# install =====================================================================
install:
	sh ./_setup/alpine.sh
	cp -n .env.example .env
	touch database/database.sqlite
	composer install --no-dev --optimize-autoloader --classmap-authoritative
	npm install --production

# deploy ======================================================================
deploy:
	rm composer.lock package-lock.json
	composer install
	npm install
	npm run build
	php artisan optimize:clear
	php artisan optimize

# test ========================================================================
test:
	php artisan test --parallel

test-full:
	rm composer.lock package-lock.json
	composer install
	npm install
	npm run build
	php artisan optimize:clear
	php artisan test --parallel
