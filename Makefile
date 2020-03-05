install:
	composer install

lint:
	which php
	composer run-script phpcs
