#!/bin/bash

ARCHIVE_DIR="/home/ars20/nginx-docker/backups/archives"

DELETED=$(find "$ARCHIVE_DIR" -type f -name "*.tar.gz" -mtime +90 -print -delete)

if [ -n "$DELETED" ]; then
    echo "Old archives deleted:"
    echo "$DELETED"
else
    echo "No old archives to delete."
fi
