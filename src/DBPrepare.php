<?php

$dbdriver = 'mysql';
$dbhost = 'localhost';
$port = '3306';
$dbname = 'YourLib';
$dbusername = 'root';
$dbpassword = '';

try {
	$conn = new PDO("$dbdriver:host=$dbhost", $dbusername, $dbpassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db = $conn->prepare( "CREATE SCHEMA IF NOT EXISTS $dbname");
	$db->execute();

	$conn->exec("CREATE TABLE IF NOT EXISTS `yourlib`.`books` (
        `id` INT(5) NOT NULL AUTO_INCREMENT ,
        `author` VARCHAR(255) NOT NULL , `name` VARCHAR(255) NOT NULL , `year` DATE NULL ,
        `resume` TEXT NULL , `status` INT(1) NOT NULL DEFAULT '0' ,
        PRIMARY KEY (`id`)) ENGINE = InnoDB;" );
} catch(PDOException $e) {
	echo 'unable' . $e->getMessage();
}
