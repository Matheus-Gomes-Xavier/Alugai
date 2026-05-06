FROM php:8.2-apache

# Habilita a extensão mysqli para conexão com MySQL
RUN docker-php-ext-install mysqli

# Copia todos os arquivos do projeto para o servidor web
COPY . /var/www/html/

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
