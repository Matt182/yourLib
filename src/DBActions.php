<?php
namespace YourLib\db;

use PDO;

$dbdriver = 'mysql';
$dbhost = 'localhost';
$port = '3306';
$dbname = 'YourLib';
$dbusername = 'root';
$dbpassword = '';


class dbActions
{
    private $conn;

    function __construct()
    {
        try {

            $this->conn = new PDO("mysql:host=localhost;dbname=yourlib", 'root', '');
        	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {

        }
    }


    function InsertBook($author, $name, $year = 0, $tag)
    {
        $this->conn->exec("INSERT INTO `books`(`author`, `name`, `year`, `tag`) VALUES ('$author', '$name', $year, '$tag')");
    }

    function showAll()
    {
        $statement = $this->conn->query("select * from yourlib.books");
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function readed($id)
    {
         $this->conn->exec("UPDATE `books` set `status`= 1 where `id`=$id");
    }

}
