FROM php:8.2-apache

# mod_rewrite
RUN a2enmod rewrite

# .htaccess
RUN echo '<Directory /var/www/html/>\n    AllowOverride All\n</Directory>' >> /etc/apache2/apache2.conf
