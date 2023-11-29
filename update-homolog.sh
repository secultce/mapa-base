#!/bin/bash
git pull --recurse-submodules
cd themes/Ceara && git pull origin master && cd .. && cd ..

sudo chown -R www-data:www-data docker-data/

docker-compose -f docker-compose-homolg.yml build --no-cache

docker-compose -f docker-compose-homolg.yml down
docker-compose -f docker-compose-homolg.yml up --detach