<?php
include('../model/admin.php');
$faqs = getAllFAQs();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addFAQ($_POST['question'], $_POST['answer']);
    } elseif (isset($_POST['edit'])) {
        updateFAQ($_POST['id'], $_POST['question'], $_POST['answer']);
    } elseif (isset($_POST['delete'])) {
        deleteFAQ($_POST['id']);
    }
    header('Location: manage_faq.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage FAQs</title>
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
            color: #111a31;
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
            background-color: #111a31;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #111a31;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<header>
    <h1>Manage FAQs</h1>
</header>

<div>
    <h2>Add a New FAQ</h2>
    <form method="POST">
        <label>Question: <input type="text" name="question" required></label><br><br>
        <label>Answer: <textarea name="answer" required></textarea></label><br><br>
        <button type="submit" name="add">Add FAQ</button>
    </form>
</div>

<div>
    <h2>Existing FAQs</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faqs as $faq): ?>
                <tr>
                    <td><?= $faq['id'] ?></td>
                    <td><?= $faq['question'] ?></td>
                    <td><?= $faq['answer'] ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $faq['id'] ?>">
                            <input type="hidden" name="question" value="<?= $faq['question'] ?>">
                            <input type="hidden" name="answer" value="<?= $faq['answer'] ?>">
                            <button type="submit" name="edit">Edit</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $faq['id'] ?>">
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
