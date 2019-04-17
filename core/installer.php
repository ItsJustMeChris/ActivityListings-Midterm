<?php
include_once 'database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = Database::getInstance();

$activitySQL ="CREATE table activities(
             ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
             activity_name VARCHAR( 50 ) NOT NULL, 
             activity_description VARCHAR( 255 ) NOT NULL,
             activity_location VARCHAR( 50 ) NOT NULL, 
             typeID INT NOT NULL,
             CONSTRAINT FK_ActivityType FOREIGN KEY (typeID) references activity_type(ID))" ;
$db->execute($activitySQL);

$activityTypeSQL ="CREATE table activity_type(
             ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
             type_name VARCHAR( 50 ) NOT NULL, 
             type_description VARCHAR (255) NOT NULL)" ;
$db->execute($activityTypeSQL);

echo "INSTALLED";