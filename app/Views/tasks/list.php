<?php include '../app/Views/layouts/header.php'; ?>
<h2>Tasks</h2>
<a href="/add-task">Add New Task</a>
<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['description']) ?></td>
            <td>
                <a href="/edit-task?id=<?= $task['id'] ?>">Edit</a>
                <form method="POST" action="/delete-task" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include '../app/Views/layouts/footer.php'; ?>
