#!/bin/bash

echo "******** Init database for Production "
echo "*** Get Database Environment "
# DB_URL=$CLEARDB_DATABASE_URL

# DB_URL => mysql://[username]:[password]@[host]/[database name]?reconnect=true
DB_URL=$(heroku config | grep CLEARDB_DATABASE_URL | awk '{print $2}')
echo $DB_URL

re="mysql://([^:]+):([^:@]+)@([^/:@]+)/([^/:@?]+)\?reconnect=true"

if [[ $DB_URL =~ $re ]];
then
    echo "*** Environment OK"
    echo "    username : " ${BASH_REMATCH[1]}
    echo "    password : " ${BASH_REMATCH[2]}
    echo "    host     : " ${BASH_REMATCH[3]}
    echo "    database : " ${BASH_REMATCH[4]}
    
    USERNAME=${BASH_REMATCH[1]}
    PASSWORD=${BASH_REMATCH[2]}
    HOST=${BASH_REMATCH[3]}
    DATABASE=${BASH_REMATCH[4]}
else
    echo "*** WARNING : Environment KO"
fi

mysql -u$USERNAME -h$HOST -p$PASSWORD $DATABASE < ./init.sql
echo "*** Job Done. "