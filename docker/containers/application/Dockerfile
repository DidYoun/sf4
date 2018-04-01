# > Image start
FROM debian:jessie

# > Contact
LABEL maintainer = "Slab Team <didier.youn@gmail.com>"

# > Project name
ARG APP_PROJECT_DIR_NAME

# > Volume
VOLUME /var/www/project

# > Contact
RUN echo Europe/Paris | tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata
