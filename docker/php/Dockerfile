FROM php:7.4-fpm

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update -y
RUN apt-get install -y cron

ADD crontab /etc/cron.d/cron
RUN chmod 0644 /etc/cron.d/cron
# Copy the start script.
COPY docker-entrypoint.sh /usr/local/bin/

# Set the entrypoint.
ENTRYPOINT ["docker-entrypoint.sh"]
# Start the service.
CMD ["php-fpm"]
