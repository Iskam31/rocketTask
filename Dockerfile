FROM wordpress:latest

COPY ./my_theme/ /var/www/html/wp_content/themes/my_theme/

RUN mkdir -p /var/www/html/wp-content/uploads && \
    mkdir -p /var/www/html/wp-content/upgrade && \
    chown -R www-data:www-data /var/www/html/wp-content

EXPOSE 80

CMD ["apache2-foreground"]