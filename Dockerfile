FROM php:8.2-apache

# Ativa o mod_rewrite e instala extensões necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Copia todos os arquivos do projeto
COPY . /var/www/html/

# Corrige permissões e define o usuário correto
RUN chown -R www-data:www-data /var/www/html

# Configura o Apache para permitir uso de .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]
