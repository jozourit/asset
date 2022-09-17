#!/bin/bash

#docker run -v docker start mysql
# docker run --name jozour-mysql -e MYSQL_ROOT_PASSWORD=my_crazy_super_secret_root_password -e MYSQL_DATABASE=jozourit -e MYSQL_USER=jozourit -e MYSQL_PASSWORD=whateverdood -d mysql
docker run -d jozour-mysql
#docker run -d -v ~/Documents/jozouryhead/jozour-it/:/var/www/html -p $(boot2docker ip)::80   --link jozour-mysql:mysql --name=jozourit jozourit
docker run --link jozour-mysql:mysql -d -p 40000:80 --name=jozour-it -v ~/Documents/jozouryhead/jozour-it/:/var/www/html \
-v ~/Documents/jozouryhead/jozour-it-storage:/var/lib/jozourit --env-file docker.env jozour-test
