#!/bin/bash
# Ask the user for their name
echo Setup database login information
echo Setup database variables
read -p 'Username: ' username
read -sp 'Password: ' password
echo ''
read -p 'Database Name: ' dbname

echo ";<?php
;die();
;/*

username=$username
password=$password
dbname=$dbname

;*/

;?>" > ../../moj_config.ini.php

echo pripravujem databazu
php setup.php
echo na prihlasenie do systemu ako administrator pouzite udaje
echo username: admin
echo password: admin
echo heslo si mozete zmetit vo vnutri appky

