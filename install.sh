#!/bin/bash
sudo apt-get -y install lamp-server^
sudo apt-get -y install php7.0-zip
sudo a2enmod rewrite 
sudo service apache2 restart
echo 'q:$apr1$4y1jPCH.$oNzkDf/th.BOzQ3DbpWfM/' > /var/www/.htpasswd
mv EasySocial /var/www/html/admin && cd /var/www/html/admin  
echo "ENTER DATABASE USER NAME:"
read dbuser
echo "ENTER DATASE PASSWORD:"
read dbpassword
mysql -u $dbuser -p$dbpassword -e "CREATE DATABASE dbcc"
echo "CREATE DATASE dbcc -> Done"
mysql -u $dbuser -p$dbpassword dbcc < dbcc.sql
exit
rm /var/www/html/admin/install.sh
echo "Succesfull!"
