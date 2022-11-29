build:
	docker build -t calculator-image:php -f ./app/php-8.1/Dockerfile ./app
	docker build -t calculator-image/db:latest -f ./db/Dockerfile ./db
	docker build -t calculator-image/nginx-app:latest -f ./nginx/app/Dockerfile ./nginx/app/
	docker build -t calculator-image/nginx-srv:latest -f ./nginx/srv/Dockerfile ./nginx/srv/