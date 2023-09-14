#!/bin/bash
git pull --recurse-submodules
cd themes/Ceara && git pull && cd .. && cd ..
docker-compose build --no-cache

./stop.sh
./start.sh
