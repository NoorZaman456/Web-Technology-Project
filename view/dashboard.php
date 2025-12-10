<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: adminlogin.php');
    exit;
}

include('../model/admin.php');

// Fetch all users
$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
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
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .actions a {
            margin-right: 10px;
            color: #111a31;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Admin Dashboard</h1>
    <h3>All Registered Users</h3>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['contact_no']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td class="actions">
                        <a href="../controller/edit_user.php?username=<?= urlencode($user['username']) ?>">Edit</a>
                        <a href="../controller/delete_user.php?username=<?= urlencode($user['username']) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <a href="logout.php" class="logout">Logout</a>
</div>

</body>
</html>
