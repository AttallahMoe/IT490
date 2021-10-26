#!/bin/bash
sudo service php7.4-fpm restart 
sudo chmod 777 /var/run/php/php7.4-fpm.sock
sudo service nginx restart 