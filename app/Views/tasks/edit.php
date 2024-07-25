<?php include '../app/Views/layouts/header.php'; ?>
<h2>Edit Task</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <br>
    <button type="submit">Edit Task</button>
</form>
<?php include '../app/Views/layouts/footer.php'; ?>
