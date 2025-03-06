<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/posts/update/<?php echo $post['id']; ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($post['description']); ?></textarea>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        <br>
        <label for="slug">Slug:</label>
        <input type="text" name="slug" value="<?php echo htmlspecialchars($post['slug']); ?>" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" value="<?php echo htmlspecialchars($post['author']); ?>" required>
        <br>
        <label for="images">Images:</label>
        <input type="file" name="images[]" multiple>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
