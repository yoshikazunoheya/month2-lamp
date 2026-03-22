FROM ubuntu:24.04
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
    php-curl \
    php-gd \
    php-mbstring \
    php-xml \
    php-zip \
    mariadb-client \
    curl \
    openssl \
    && apt-get clean
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
RUN a2enmod rewrite
RUN a2enmod ssl
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/server.key \
    -out /etc/ssl/certs/server.crt \
    -subj "/CN=localhost"
RUN sed -i 's|/etc/ssl/certs/ssl-cert-snakeoil.pem|/etc/ssl/certs/server.crt|' /etc/apache2/sites-available/default-ssl.conf \
    && sed -i 's|/etc/ssl/private/ssl-cert-snakeoil.key|/etc/ssl/private/server.key|' /etc/apache2/sites-available/default-ssl.conf
RUN a2ensite default-ssl.conf
EXPOSE 80
EXPOSE 443

CMD ["apachectl", "-D", "FOREGROUND"]