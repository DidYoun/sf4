# > Image start
FROM php:7.2.0-fpm

# > Contact
LABEL maintainer = "Slab Team <didier.youn@gmail.com>"

# > Contact
ARG APP_PROJECT_DIR_NAME

# > Directory target
WORKDIR /var/www/project

# > Install packages
RUN apt-get update && apt-get install -y \
   apt-utils \
   sudo \
   wget \
   unzip \
   cron \
   curl \
   libmcrypt-dev \
   libicu-dev \
   libxml2-dev libxslt1-dev \
   libfreetype6-dev \
   libjpeg62-turbo-dev \
   #libpng12-dev \
   git \
   vim \
   openssh-server \
   mysql-client \
   ocaml \
   expect \
   && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
   && docker-php-ext-configure hash --with-mhash \
   && docker-php-ext-install -j$(nproc) intl xsl gd zip pdo_mysql opcache soap bcmath json iconv \
   && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
   && pecl install xdebug-2.6.0 && docker-php-ext-enable xdebug \
   && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.remote_port=9009" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.remote_host=docker.for.mac.localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && echo "xdebug.max_nesting_level=1000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && chmod 666 /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && mkdir /var/run/sshd \
   && apt-get clean && apt-get update && apt-get install -y nodejs \
   # && ln -s /usr/bin/nodejs /usr/bin/node \
   # && apt-get install -y npm \
   && echo "StrictHostKeyChecking no" >> /etc/ssh/ssh_config

# > PHP config
ADD conf/php.ini /usr/local/etc/php
ADD conf/project.pool.conf /usr/local/etc/php/pool.d/

# > Add & run binaries
COPY bin/* /usr/local/bin/
RUN chmod +x /usr/local/bin/start
#RUN chmod +x /usr/local/bin/slab-setup

# > Initial scripts
RUN sed -i 's/^/;/' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
   && sed -i 's/^;;*//' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

USER root

# > Setup aliases / timezone
RUN echo Europe/Paris | tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata
RUN echo "alias ll='ls -l'" >> ~/.bashrc

# > Setup permissions
RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www/
# RUN chown -R www-data:www-data /var/www/.composer
RUN chown www-data:www-data /var/www/project/

# > Run image
CMD ["/usr/local/bin/start"]
