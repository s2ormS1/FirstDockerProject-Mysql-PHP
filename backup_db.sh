#!/bin/bash

BACKUP_DIR="/home/ars20/nginx-docker/backups"
DATE=$(date +"%Y-%m-%d_%H-%M-%S")

mkdir -p "$BACKUP_DIR"

docker-compose exec -T db sh -c \
'mysqldump -u root -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE"' \
> "$BACKUP_DIR/travel_agency_$DATE.sql"

if [ $? -eq 0 ]; then
    echo "Backup created: $BACKUP_DIR/travel_agency_$DATE.sql"
else
    echo "Backup FAILED!"
    rm -f "$BACKUP_DIR/travel_agency_$DATE.sql"
    exit 1
fi

