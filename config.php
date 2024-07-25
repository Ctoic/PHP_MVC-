<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'MyStrongPassword1234$');
define('DB_NAME', 'todo_app_db');

function connect()
{
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($connection->connect_error) {
        die('Connection Failed: ' . $connection->connect_error);
    }
    return $connection;
}
?>


