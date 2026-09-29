<?php
$dbh = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
$dbh->exec('CREATE DATABASE IF NOT EXISTS `larav_pikr`;');
echo "Database created.\n";
