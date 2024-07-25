<?php
require_once '../../config.php';

class Database
{
    protected $connection;

    public function __construct()
    {
        $this->connection = connect();
    }
}
?>
