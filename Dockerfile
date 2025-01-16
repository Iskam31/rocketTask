FROM wordpress:latest

COPY ./my_theme/ /var/www/html/wp_content/themes/my_theme/

COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh
ENTRYPOINT ["sh", "/usr/local/bin/init.sh"]

EXPOSE 80

CMD ["apache2-foreground"]