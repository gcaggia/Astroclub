#!/bin/bash

DB_URL=$(heroku config | grep CLEARDB_DATABASE_URL | awk '{print $2}')

# [A-Za-z0-9._%+-]
re="mysql://([^:]+):([^:@]+)@([^/:@]+)/([^/:@?]+)\?reconnect=true"

if [[ $DB_URL =~ $re ]]; then
    USERNAME=${BASH_REMATCH[1]}
    PASSWORD=${BASH_REMATCH[2]}
    HOST=${BASH_REMATCH[3]}
    DATABASE=${BASH_REMATCH[4]}
else
    echo "Unable to connect... Error..."
fi


mysql -u$USERNAME -h$HOST -p$PASSWORD $DATABASE