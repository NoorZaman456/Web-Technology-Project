<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Admin Dashboard</h1>
    </header>

    <div>
        <h2>FAQ</h2>
        <a href="manage_faq.php">Manage all FAQ</a>
    </div>

    <div>
        <h2>Highlights</h2>
        <a href="manage_highlight.php">Manage all Highlights</a>
    </div>

    <div>
        <h2>Accessibility</h2>
        <a href="manage_accessibility.php">Manage all Accessibilities</a>
    </div>

    <div>
        <h2>Policy</h2>
        <a href="manage_policy.php">Manage all Policies</a>
    </div>

    <footer>
        <p>&copy; 2025 Hotel Management System</p>
    </footer>
</body>
</html>
