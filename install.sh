#!/bin/bash

sudo apt-get -y -o Dpkg::Options::="--force-confdef" -o Dpkg::Options::="--force-confold" dist-upgrade
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

cd /root/ && git clone https://github.com/ir0njaw/mailinabox && cd mailinabox && sudo setup/start.sh
cd /root/HumanTracker
apt-get -y install mysql-server
apt-get -y install php-fpm php-mysql

echo 'root:$apr1$vGZ6JkMF$ZcoktoPQA92Ft.QBbC/Iv/' > /etc/nginx/.htpasswd

echo "_______________________________"
echo "Installation of FuckHumans 1.0"
echo "_______________________________"

mv /root/HumanTracker /home/user-data/www/default/admin
HOSTNAME=${HOSTNAME//box.}
mv /home/user-data/www/default/admin/local.conf /home/user-data/www/$HOSTNAME.conf
/root/mailinabox/tools/web_update
service nginx restart

dbuser=root
dbpassword=123QWEasd
mysql -u $dbuser -p$dbpassword -e "CREATE DATABASE dbcc"
mysql -u $dbuser -p$dbpassword -e "CREATE USER 'social'@'localhost' IDENTIFIED BY '123QWEasd'"
mysql -u $dbuser -p$dbpassword -e "GRANT ALL PRIVILEGES ON dbcc.* TO 'social'@'localhost'"
mysql -u $dbuser -p$dbpassword dbcc < /home/user-data/www/default/admin/dbcc.sql

rm /home/user-data/www/default/admin/dbcc.sql
rm /home/user-data/www/default/admin/install.sh
rm /home/user-data/www/default/admin/packages-microsoft-prod.deb
rm -rf /home/user-data/www/default/admin/.git/
sudo chmod -R 757 /home/user-data/www/default/ 2> /dev/null
rm /etc/cron.d/mailinabox-nightly

echo "_______________________________"
echo "HumanTracker 1.0 has been successfully installed!!!"
echo "_______________________________"
