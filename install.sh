#!/bin/bash
sudo apt-get -y install lamp-server^
sudo apt-get -y install php7.0-zip
sudo a2enmod rewrite 
sudo service apache2 restart
echo 'q:$apr1$4y1jPCH.$oNzkDf/th.BOzQ3DbpWfM/' > /var/www/.htpasswd
cd ../ && mv EasySocial /var/www/html/admin && cd /var/www/html/admin  
echo "///////////////////////////////"
echo "ENTER DATABASE USER NAME:"
echo "///////////////////////////////"
read dbuser
echo "///////////////////////////////"
echo "ENTER DATASE PASSWORD:"
echo "///////////////////////////////"
read dbpassword
mysql -u $dbuser -p$dbpassword -e "CREATE DATABASE dbcc"
echo "CREATE DATASE dbcc -> Done"
mysql -u $dbuser -p$dbpassword dbcc < dbcc.sql
\q
rm /var/www/html/admin/install.sh
rm /var/www/html/admin/dbcc.sql
sudo chmod -R 757 /var/www
echo "///////////////////////////////"
read -r -p "If the password from the database != 'root' then you need to change config file, ok? [y/N] " response
if [[ "$response" =~ ^([yY][eE][sS]|[yY])+$ ]]
then
    nano /var/www/html/admin/cc/bd.php
fi
echo "///////////////////////////////"
echo ""
echo "FuckHumans has been successfully installed!!!"

