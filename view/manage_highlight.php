<?php
include('../model/admin.php');
$highlights = getAllHighlights();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addHighlight($_POST['title'], $_POST['description']);
    } elseif (isset($_POST['edit'])) {
        updateHighlight($_POST['id'], $_POST['title'], $_POST['description']);
    } elseif (isset($_POST['delete'])) {
        deleteHighlight($_POST['id']);
    }
    header('Location: manage_highlight.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Highlights</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #111a31;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin: 0;
        }

        div {
            margin: 20px auto;
            width: 80%;
            text-align: center;
            padding: 10px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        div h2 {
            color: #111a31;
            font-size: 1.8em;
        }

        div a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 1.2em;
        }

        div a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #111a31;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<header>
    <h1>Manage Highlights</h1>
</header>

<div>
    <h2>Add a New Highlight</h2>
    <form method="POST">
        <label>Title: <input type="text" name="title" required></label><br><br>
        <label>Description: <textarea name="description" required></textarea></label><br><br>
        <button type="submit" name="add">Add Highlight</button>
    </form>
</div>

<div>
    <h2>Existing Highlights</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($highlights as $highlight): ?>
                <tr>
                    <td><?= $highlight['id'] ?></td>
                    <td><?= $highlight['title'] ?></td>
                    <td><?= $highlight['description'] ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $highlight['id'] ?>">
                            <input type="hidden" name="title" value="<?= $highlight['title'] ?>">
                            <input type="hidden" name="description" value="<?= $highlight['description'] ?>">
                            <button type="submit" name="edit">Edit</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $highlight['id'] ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; 2025 Hotel Management System</p>
</footer>

</body>
</html>
