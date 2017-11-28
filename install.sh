#!/bin/bash
sudo apt-get -y install lamp-server^
sudo apt-get -y install php7.0-zip
sudo a2enmod rewrite 
sudo service apache2 restart
echo 'q:$apr1$4y1jPCH.$oNzkDf/th.BOzQ3DbpWfM/' > /var/www/.htpasswd
cd ../ && mv EasySocial /var/www/html/admin && cd /var/www/html/admin  
echo "ENTER DATABASE USER NAME:"
read dbuser
echo "ENTER DATASE PASSWORD:"
read dbpassword
mysql -u $dbuser -p$dbpassword -e "CREATE DATABASE dbcc"
echo "CREATE DATASE dbcc -> Done"
mysql -u $dbuser -p$dbpassword dbcc < dbcc.sql
\q
rm /var/www/html/admin/install.sh
rm /var/www/html/admin/dbcc.sql
sudo chmod -R 757 /var/www
echo "FuckHumans has been successfully installed!!!"
nano /var/www/html/admin2/cc/bd.php
