<?php
require_once 'Database.php';

class User extends Database
{
    public function register($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connection->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $name, $email, $hashedPassword);
        return $stmt->execute();
    }

    public function login($email, $password)
    {
        $stmt = $this->connection->prepare('SELECT id, password, role FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashedPassword, $role);
            $stmt->fetch();
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['user_id'] = $id;
                $_SESSION['role'] = $role;
                return true;
            }
        }
        return false;
    }
}
?>
