<?php
namespace YourLib\rout;

require_once '../vendor/autoload.php';
use YourLib\db\dbActions;

$db = new dbActions();

if (isset($_POST['name'])) {
    $author = $_POST['author'];
    $name = $_POST['name'];
    if (empty($_POST['year'])) {
        $year = 0;
    } else {
        $year = $_POST['year'];
    }
    $tag = $_POST['tag'];
    $db->InsertBook($author, $name, $year, $tag);
    header('Location:/yourlib/index.php');
}
?>
