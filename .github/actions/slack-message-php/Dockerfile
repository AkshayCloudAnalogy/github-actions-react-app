FROM php:7.4.2

COPY --from=composer /user/bin/composer /user/bin/composer

WORKDIR /usr/src/app
# Not copy vendor folder
COPY composer.json .
COPY composer.lock .
COPY script.php .
COPY Dockerfile .

RUN apt-get update
RUN apt-get -y install zip
RUN composer install

ENTRYPOINT [ "php", "/usr/src/app/script.php" ]