# Use official PHP Apache image
FROM php:8.2-apache

# Enable PDO and MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files into Apache web root
COPY src/ /var/www/html/
