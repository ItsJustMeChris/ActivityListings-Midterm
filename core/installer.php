<?php
include_once 'database.php';

$db = Database::getInstance();

$sql ="CREATE table activities(
             ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
             activity_name VARCHAR( 50 ) NOT NULL, 
             activity_description VARCHAR( 255 ) NOT NULL,
             activity_location VARCHAR( 50 ) NOT NULL, 
             activity_poster INT( 11 ) NOT NULL)" ;
$db->execute($sql);

echo "INSTALLED";