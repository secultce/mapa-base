#!/bin/bash
git pull --recurse-submodules

docker-compose build

./stop.sh
./start.sh
