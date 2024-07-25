<?php
require_once '../app/Models/Task.php';

class TaskController
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $task = new Task();
            $tasks = $task->getAll();
            require_once '../app/Views/tasks/list.php';
        } else {
            header('Location: /login');
        }
    }

    public function create()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = new Task();
            $task->add($_POST['title'], $_POST['description']);
            header('Location: /tasks');
        }
        require_once '../app/Views/tasks/add.php';
    }

    public function edit()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = new Task();
            $task->edit($_POST['id'], $_POST['title'], $_POST['description']);
            header('Location: /tasks');
        }
        require_once '../app/Views/tasks/edit.php';
    }

    public function delete()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = new Task();
            $task->delete($_POST['id']);
            header('Location: /tasks');
        }
        require_once '../app/Views/tasks/manage.php';
    }
}
?>
