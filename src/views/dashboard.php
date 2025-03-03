<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>You are logged in as <mark><?php echo htmlspecialchars($_SESSION['user_role']); ?>.<mark></p>

    <a href="/users">Users</a><br>
    <a href="/posts">Posts</a><br><br>

    <a href="/auth/logout">Logout</a>
</body>
</html> 