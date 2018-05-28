until cd /var/www/web && /var/www/bin/yiimp checkup
do
    echo "Retrying checkup"
done

/var/www/web/main.sh & /var/www/web/loop2.sh & /var/www/web/blocks.sh & php-fpm

echo "success"
