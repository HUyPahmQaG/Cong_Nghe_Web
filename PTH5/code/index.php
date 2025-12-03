<?php
require "./config/database.php";
require "./controllers/StudentController.php";

$db = (new Database())->connect();
$controller = new StudentController($db);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case "index":  $controller->index(); break;
    case "addForm": $controller->addForm(); break;
    case "add": $controller->add(); break;
    case "editForm": $controller->editForm(); break;
    case "update": $controller->update(); break;
    case "delete": $controller->delete(); break;
}
