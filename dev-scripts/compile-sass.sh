#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
CDIR=$( pwd )
cd $DIR

MAPAS_NAME=mapas

docker exec -i $MAPAS_NAME "/var/www/scripts/compile-sass.sh"

cd $CDIR