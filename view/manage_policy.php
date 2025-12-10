<?php
include('../model/admin.php');
$policies = getAllPolicies();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addPolicies($_POST['title'], $_POST['content']);
    } elseif (isset($_POST['edit'])) {
        updatePolicies($_POST['id'], $_POST['title'], $_POST['content']);
    } elseif (isset($_POST['delete'])) {
        deletePolicies($_POST['id']);
    }
    header('Location: manage_policy.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Policies</title>
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
    <h1>Manage Policies</h1>
</header>

<div>
    <h2>Add a New Policy</h2>
    <form method="POST">
        <label>Title: <input type="text" name="title" required></label><br><br>
        <label>Content: <textarea name="content" required></textarea></label><br><br>
        <button type="submit" name="add">Add Policy</button>
    </form>
</div>

<div>
    <h2>Existing Policies</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($policies as $policy): ?>
                <tr>
                    <td><?= $policy['id'] ?></td>
                    <td><?= $policy['title'] ?></td>
                    <td><?= $policy['content'] ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $policy['id'] ?>">
                            <input type="hidden" name="title" value="<?= $policy['title'] ?>">
                            <input type="hidden" name="content" value="<?= $policy['content'] ?>">
                            <button type="submit" name="edit">Edit</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $policy['id'] ?>">
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
