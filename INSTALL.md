build stratum server binary
---
> cd stratum/iniparser  
> make  
> cd ..  
> make  
> cd ..  
> cd blocknotify  
> make  
> cd ..  

install web server deps
---
> sudo apt install php php-curl php-mysql php-memcache mysql-server nginx memcached screen

follow instructions for configuring nginx, then...
---
> sudo service nginx restart

set up sql accounts for users php and yiimp, then...
---
> cd sql  
> ./load_sql.sh  
> cd ..  

set up stratum folder
---
> mkdir /var/stratum  
> mkdir /var/stratum/config  
> cp -rf stratum/config /var/stratum/  
> cp stratum/config/foo.conf /var/stratum  
> sudo cp stratum/stratum /var/stratum/  
> sudo cp blocknotify/blocknotify /var/stratum/  

setup web folder
---
> sudo cp web/keys.sample.php web/keys.php  

then configure the file
---
> sudo vim /etc/yiim/keys.php

copy over
---
> sudo cp -rf web/ /var/www/web

then configure the web app
---
> sudo mv /var/www/web/serverconfig.sample.php /var/www/web/serverconfig.php  
> sudo vim /var/www/web/serverconfig.php  
> ... need to change YAAMP_DBNAME, YAAMP_DBUSER, and YAAMP_DBPASSWORD  

make sure everything works
---
> cd bin  
> ./yiimp checkup  

run scripts in screen
---
> cd /var/www/web  
> screen  
> ./main.sh  
> ... switch screen ...  
> ./loop2.sh  
> ... switch screen ...  
> ./block.sh  

## For docker users

copy and change docker env
---
> cd yiimplara
> cp env-example .env
> vi .env (change mysql part)

run docker
---
> cd yiimplara
> make up

go into php-fpm container
---
> make in

load sql in container
---
> cd /var/www/sql
> ./load-sql.sh

open browser at http://localhost:2080
---
> open http://localhost:2080

view debug.log at /var/www/web/log/debug.log
---
> tail -f web/log/debug.log