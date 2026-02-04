clear:
	php artisan optimize:clear

build:
	php artisan optimize:clear
	php artisan optimize

test:
	php artisan test --parallel

test-full:
	rm composer.lock package-lock.json
	composer install
	npm install
	npm run build
	php artisan optimize:clear
	php artisan test --parallel
