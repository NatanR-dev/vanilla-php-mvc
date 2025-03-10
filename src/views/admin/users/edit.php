<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <a href="../" style="text-decoration: none; color: blue;">&#x21A9;</a>
    <br><br>

    <h1>Edit User</h1>

    <form action="/admin/users/update/<?php echo htmlspecialchars($user['id']); ?>" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="editor" <?php echo $user['role'] === 'editor' ? 'selected' : ''; ?>>Editor</option>
            <option value="author" <?php echo $user['role'] === 'author' ? 'selected' : ''; ?>>Author</option>
        </select>
        
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" value="<?php echo htmlspecialchars($user['birthday']); ?>" required>
        
        <button type="submit">Update</button>
    </form>
</body>
</html> 