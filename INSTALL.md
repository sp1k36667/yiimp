# build stratum server binary
cd stratum/iniparser
make
cd ..
make
cd ..
cd blocknotify
make
cd ..

# install web server deps
sudo apt install php mysql-server nginx

# follow instructions for configuring nginx, then...
sudo service nginx restart
# set up sql accounts for users php and yiimp, then...
cd sql
./load_sql.sh
cd ..

# set up stratum folder
mkdir /var/stratum
mkdir /var/stratum/config
cp -rf stratum/config /var/stratum/
cp stratum/config/foo.conf /var/stratum
sudo cp stratum/stratum /var/stratum/
sudo cp blocknotify/blocknotify /var/stratum/

# setup web folder
mkdir /var/web

mkdir /etc/yiimp/
sudo cp web/keys.sample.php /etc/yiimp/keys.php
# then configure the file
sudo vim /etc/yiim/keys.php

# copy over
sudo cp -rf web/ /var/web

# then configure the web app
sudo mv /var/web/serverconfig.sample.php /var/web/serverconfig.php
sudo vim /var/web/serverconfig.php
