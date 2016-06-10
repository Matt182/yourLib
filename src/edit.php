<?php
namespace YourLib\db;
require_once '../vendor/autoload.php';
use YourLib\db\dbActions;

$db = new dbActions();

if (isset($_POST['id'])) {
    $db->readed($_POST['id']);
    header("Location:/yourLib/");
}
