<?php
class HomeController
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $userRole = $_SESSION['role'];
            if ($userRole == 'admin') {
                require_once '../app/Views/home/admin.php';
            } else {
                require_once '../app/Views/home/user.php';
            }
        } else {
            header('Location: /login');
        }
    }
}
?>
