<?php
require_once '../app/Models/User.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            if ($user->login($_POST['email'], $_POST['password'])) {
                header('Location: /tasks');
            } else {
                $error = 'Invalid credentials';
            }
        }
        require_once '../app/Views/auth/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            if ($user->register($_POST['name'], $_POST['email'], $_POST['password'])) {
                header('Location: /login');
            } else {
                $error = 'Registration failed';
            }
        }
        require_once '../app/Views/auth/register.php';
    }
}
?>
