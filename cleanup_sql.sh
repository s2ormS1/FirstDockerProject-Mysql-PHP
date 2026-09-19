#!/bin/bash

BACKUP_DIR="/home/ars20/nginx-docker/backups"

DELETED=$(find "$BACKUP_DIR" -maxdepth 1 -type f -name "*.sql" -mtime +14 -print -delete)

if [ -n "$DELETED" ]; then
    echo "Old SQL backups deleted:"
    echo "$DELETED"
else
    echo "No old SQL backups to delete."
fi
