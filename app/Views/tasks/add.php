<?php include '../app/Views/layouts/header.php'; ?>
<h2>Add Task</h2>
<form method="POST">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <br>
    <button type="submit">Add Task</button>
</form>
<?php include '../app/Views/layouts/footer.php'; ?>
