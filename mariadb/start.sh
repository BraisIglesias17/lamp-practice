#!/bin/bash

service mariadb start

while ! mariadb-admin ping; do sleep 1; done;

echo "$DBNAME"


db="CREATE DATABASE IF NOT EXISTS $DBNAME;" 
query="SELECT User FROM mysql.user WHERE User='$DBUSER';"
#comprobar si ya existe el usuario
resultado=$(echo "$query" | mysql -u root -N)

if [ ! -n "$resultado" ]; then
  user_db="CREATE USER '$DBUSER'@'%' IDENTIFIED BY '$DBPASS'; GRANT ALL PRIVILEGES ON $DBNAME.* TO '$DBUSER'@'%' IDENTIFIED BY '$DBPASS' WITH GRANT OPTION; FLUSH PRIVILEGES;"
fi

echo "$db" | mariadb -u root
echo "$user_db" | mariadb -u root

unset DBNAME DBUSER DBPASS

/bin/bash
