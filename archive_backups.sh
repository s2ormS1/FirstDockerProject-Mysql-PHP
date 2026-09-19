#!/bin/bash

BACKUP_DIR="/home/ars20/nginx-docker/backups"
ARCHIVE_DIR="$BACKUP_DIR/archives"
DATE=$(date +"%Y-%m-%d")

mkdir -p "$ARCHIVE_DIR"

tar -czf "$ARCHIVE_DIR/backups_$DATE.tar.gz" \
	"$BACKUP_DIR"/*.sql

if [ $? -eq 0 ]; then
	echo "Archive created: $ARCHIVE_DIR/backups_$DATE.tar.gz"
else
	echo "Archive FAILED!"
	exit 1
fi
