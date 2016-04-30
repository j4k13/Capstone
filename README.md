# Capstone
AUTHOR: Jacqueline Anderson

WHAT YOU WILL NEED:
-------------------

-An Operating System supports Bash and Crontab
-Apache
-Php compiled with the Curl libraries


HOW TO INSTALL:
---------------

1) Clone the repo (https://github.com/j4k13/Capstone.git) to where ever you store your executables for your server.
2) run command: sh createLocFiles.sh zips.txt -this creates the files that store information for locations
3) insert these four lines into crontab:
	00 * * * * root cd /var/www/html/Capstone;/usr/bin/php /var/www/html/Capstone/pagepuller.php
	05 * * * * root cd /var/www/html/Capstone;/usr/bin/php /var/www/html/Capstone/tryTraffic.php
	06 * * * * root cd /var/www/html/Capstone;/usr/bin/php /var/www/html/Capstone/weatherStrip.php
	07 * * * * root cd /var/www/html/Capstone; sh fileclear.sh

EXPANSION:
----------


