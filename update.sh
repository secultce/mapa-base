#!/bin/bash
git pull --recurse-submodules

docker-compose build --no-cache

./stop.sh
./start.sh
