<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>
    <h1>Users List</h1>
    <a href="/users/create">Add New User</a><br></br>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name Completo</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
            <td><?php echo htmlspecialchars($user['birthday']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
            <td>
                <a href="/users/edit/<?php echo htmlspecialchars($user['id']); ?>">Edit</a>
                <a href="/users/delete/<?php echo htmlspecialchars($user['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html> 