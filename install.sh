#!/bin/bash

wget -q https://packages.microsoft.com/config/ubuntu/18.04/packages-microsoft-prod.deb
sudo dpkg -i packages-microsoft-prod.deb
sudo apt-get update
sudo add-apt-repository universe
sudo apt-get install -y powershell

apt-get -y install build-essential libssl-dev libffi-dev python3-dev
apt-get -y install python-dev python-setuptools
apt-get -y install python-pip
pip2 install openpyxl
pip2 install pillow

echo "_______________________________"
echo "Installation of Mailinabox"
echo "_______________________________"

cd ../ && git clone https://github.com/mail-in-a-box/mailinabox && cd mailinabox && sudo setup/start.sh
cd ../ && cd HumanTracker
apt-get -y install mysql-server
apt-get -y install php-fpm php-mysql

echo 'root:$apr1$vGZ6JkMF$ZcoktoPQA92Ft.QBbC/Iv/' > /etc/nginx/.htpasswd

echo "_______________________________"
echo "Installation of FuckHumans 1.0"
echo "_______________________________"

cd ../ && mv HumanTracker /home/user-data/www/default/admin && cd /home/user-data/www/default/admin
dbuser=root
dbpassword=123QWEasd
mysql -u $dbuser -p$dbpassword -e "CREATE DATABASE dbcc"
mysql -u $dbuser -p$dbpassword -e "CREATE USER 'social'@'localhost' IDENTIFIED BY '123QWEasd'"
mysql -u $dbuser -p$dbpassword -e "GRANT ALL PRIVILEGES ON dbcc.* TO 'social'@'localhost'"
mysql -u $dbuser -p$dbpassword dbcc < dbcc.sql

rm /home/user-data/www/default/admin/dbcc.sql
rm /home/user-data/www/default/admin/install.sh
sudo chmod -R 757 /home/user-data/www/default/

echo "_______________________________"
echo "FuckHumans 1.0 has been successfully installed!!!"
echo "_______________________________"
