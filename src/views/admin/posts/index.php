<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post List - Admin</title>
</head>
<body>
    <a href="/admin/dashboard" style="text-decoration: none; color: blue; font-size: 2rem;">&#x2302;</a>

    <h1>Post List</h1>

    <a href="/admin/posts/create">Add New Post</a>
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
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo htmlspecialchars($post['id']); ?></td>
                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                    <td><?php echo htmlspecialchars($post['description']); ?></td>
                    <td>
                        <a href="/admin/posts/edit/<?php echo $post['id']; ?>">Edit</a>
                        <form action="/admin/posts/delete/<?php echo $post['id']; ?>" method="POST" style="display:inline;">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
