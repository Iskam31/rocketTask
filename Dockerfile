FROM wordpress:latest

COPY ./my_theme/ /var/www/html/wp_content/themes/my_theme/

EXPOSE 80

CMD ["apache2-foreground"]