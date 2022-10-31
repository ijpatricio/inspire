FROM node:16 as build_frontend

WORKDIR /app
COPY . /app
RUN npm install
RUN npm run build
RUN rm -rf node_modules

FROM composer:2 as build_composer
WORKDIR /app
COPY --from=build_frontend /app /app
RUN composer install --no-dev --ignore-platform-reqs --no-interaction

FROM ubuntu:22.04

ARG POSTGRES_VERSION=14

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y nano cron nginx \
       gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && echo "keyserver hkp://keyserver.ubuntu.com:80" >> ~/.gnupg/dirmngr.conf \
    && gpg --recv-key 0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c \
    && gpg --export 0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c > /usr/share/keyrings/ppa_ondrej_php.gpg \
    && echo "deb [signed-by=/usr/share/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.1-cli php8.1-fpm \
       php8.1-pgsql php8.1-sqlite3 php8.1-gd \
       php8.1-curl \
       php8.1-mysql php8.1-mbstring \
       php8.1-xml php8.1-zip php8.1-bcmath \
       php8.1-intl php8.1-readline \
       php8.1-msgpack php8.1-igbinary php8.1-redis \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /usr/share/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/usr/share/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install -y mysql-client \
    && apt-get install -y postgresql-client-$POSTGRES_VERSION \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# USER
RUN groupadd --force -g 1000 forge
RUN useradd -ms /bin/bash --no-user-group -g 1000 -u 1000 forge
RUN usermod -aG sudo forge
RUN usermod -aG forge www-data

# NGINX
COPY ./docker/production/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/production/nginx_default.conf /etc/nginx/sites-available/default

# PHP
COPY ./docker/production/php-fpm.conf /etc/php/8.1/fpm/php-fpm.conf
COPY ./docker/production/www.conf /etc/php/8.1/fpm/pool.d/www.conf
COPY ./docker/production/php.ini /etc/php/8.1/cli/conf.d/99-php.ini

# SERVICES
COPY ./docker/production/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# PROJECT FILES OWNERSHIP AND PERMISSIONS
RUN chown -R forge:forge /var/www
COPY --from=build_composer --chown=forge:forge /app /var/www/html

EXPOSE 80

CMD ["/usr/bin/supervisord"]
