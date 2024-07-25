<?php

echo "Conected ";

require_once '../config.php';
require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/AuthController.php';
require_once '../app/Controllers/TaskController.php';
require_once '../app/Controllers/UserController.php';

$url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : [];

switch ($url[0]) {
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'logout':
        session_start();
        session_destroy();
        header('Location: /');
        break;
    case 'tasks':
        $controller = new TaskController();
        $controller->index();
        break;
    case 'add-task':
        $controller = new TaskController();
        $controller->create();
        break;
    case 'edit-task':
        $controller = new TaskController();
        $controller->edit();
        break;
    case 'delete-task':
        $controller = new TaskController();
        $controller->delete();
        break;
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}
?>
