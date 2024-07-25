<?php
require_once 'Database.php';

class Task extends Database
{
    public function getAll()
    {
        $sql = 'SELECT * FROM tasks';
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add($title, $description)
    {
        $stmt = $this->connection->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
        $stmt->bind_param('ss', $title, $description);
        $stmt->execute();
    }

    public function edit($id, $title, $description)
    {
        $stmt = $this->connection->prepare('UPDATE tasks SET title = ?, description = ? WHERE id = ?');
        $stmt->bind_param('ssi', $title, $description, $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->connection->prepare('DELETE FROM tasks WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>
