<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <a href="./" style="text-decoration: none; color: blue;">&#x21A9;</a>
    <br><br>

    <h1>Create User</h1>
    <form action="/admin/users/store" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" required>
        
        <label for="username">User Name:</label>
        <input type="text" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <label for="role">Role:</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="author">Author</option>
        </select>
        
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" required>
        
        <button type="submit">Create</button>
    </form>
</body>
</html> 