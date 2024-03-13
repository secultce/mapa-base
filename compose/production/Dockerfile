FROM hacklab/mapasculturais:v5.7.1

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/conf-common.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d

COPY compose/common/robots.txt /var/www/html/robots.txt

COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins
