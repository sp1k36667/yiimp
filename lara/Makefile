up:
	docker-compose up -d nginx memcached mysql
in:
	docker-compose exec php-fpm bash
w:
	docker-compose exec workspace bash
exec-mysql:
	docker-compose exec mysql bash
exec-memcached:
	docker-compose exec memcached bash
exec-fpm:
	docker-compose exec php-fpm bash
rm:
	docker rm `docker ps -a -q`
rmi:
	docker rmi `docker images -q --filter "dangling=true"`
