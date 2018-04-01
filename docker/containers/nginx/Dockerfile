# > Image start
FROM debian:jessie

# > Contact
LABEL maintainer = "Slab Team <didier.youn@gmail.com>"

# > Add extra packages
RUN apt-get update && apt-get install -y nginx nginx-extras vim

# > Add SSL certs
RUN mkdir /etc/nginx/cert
ADD cert/* /etc/nginx/cert/

# > Add env variables
ARG APP_PROJECT_TYPE

# > Add virtuals hosts
ADD nginx.conf /etc/nginx/
ADD vhost.${APP_PROJECT_TYPE}.conf /etc/nginx/sites-available/
ADD vhost.${APP_PROJECT_TYPE}_ssl.conf /etc/nginx/sites-available/
RUN ln -s /etc/nginx/sites-available/vhost.${APP_PROJECT_TYPE}.conf /etc/nginx/sites-enabled/vhost
RUN ln -s /etc/nginx/sites-available/vhost.${APP_PROJECT_TYPE}_ssl.conf /etc/nginx/sites-enabled/vhost_ssl
RUN rm /etc/nginx/sites-enabled/default

# > Docker mapping
RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

# > Set usergroup
RUN usermod -u 1000 www-data

# > Set timezone
RUN echo Europe/Paris | tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata

# > Expose ports
EXPOSE 80
EXPOSE 443

# > Run image
CMD ["nginx"]