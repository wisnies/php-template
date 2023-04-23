## Project template

Project template using **php:8.2.5-fpm** and **nginx:1.24.0-alpine** images.

#### Before starting application
* build docker containers by typing `docker-compose up` in the `docker/` directory
* install dependencies by typing `composer install` in the `src/` directory.

#### Testing
* run `./vendor/bin/phpunit` inside `php_template` container.

