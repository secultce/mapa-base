#!/bin/bash

sudo chown -R www-data: docker-data/public-files/ docker-data/assets/
docker-compose up --detach