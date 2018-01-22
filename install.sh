#!/bin/bash

pip2 install openpyxl
pip2 install pillow

echo "///////////////////////////////"
echo "Installation of Mailinabox"
echo "///////////////////////////////"

git clone https://github.com/mail-in-a-box/mailinabox && cd mailinabox && sudo setup/start.sh
cd ../ && rm -rf mailinabox/
apt-get -y install mysql-server
apt-get -y install php5-fpm php5-mysql

echo "///////////////////////////////"
echo "replace nginx conf"
pwd
mv local.conf /etc/nginx/conf.d/
mv php.ini /etc/php5/fpm/
echo 'root:$apr1$vGZ6JkMF$ZcoktoPQA92Ft.QBbC/Iv/' > /etc/nginx/.htpasswd

#Меняем servername конфига nginx
host=`cat /etc/hostname | sed 's/box.//g'`
echo $host
perl -p -i -e 's/tador.men/'${host}'/g' /etc/nginx/conf.d/local.conf
service nginx restart
echo "///////////////////////////////"
echo "Nginx config installed"
echo "///////////////////////////////"
echo ""

echo "///////////////////////////////"
echo "Installation of FuckHumans 1.0"
echo "///////////////////////////////"

cd ../ && mv HumanFucker /home/user-data/www/default/admin && cd /home/user-data/www/default/admin
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

rm /home/user-data/www/default/admin/dbcc.sql
rm /home/user-data/www/default/admin/install.sh
sudo chmod -R 757 /home/user-data/www/default/

echo "///////////////////////////////"
read -r -p "If the password from the database != 'root' -> change config file, ok? [y/N] " response
if [[ "$response" =~ ^([yY][eE][sS]|[yY])+$ ]]
then
    nano /home/user-data/www/default/admin/cc/bd.php
fi
echo "///////////////////////////////"
echo "FuckHumans 1.0 has been successfully installed!!!"
echo "///////////////////////////////"
