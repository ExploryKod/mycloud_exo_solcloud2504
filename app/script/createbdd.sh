#!/bin/bash
sudo echo "CREATE DATABASE $1;";
sudo mysql -e "CREATE DATABASE $1;"
sudo mysql -e "CREATE USER '$1'@'localhost' IDENTIFIED BY '$2';"
sudo mysql -e "GRANT ALL PRIVILEGES ON $1.* TO '$1'@'localhost';"