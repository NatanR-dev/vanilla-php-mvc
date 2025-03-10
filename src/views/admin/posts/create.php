<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post - Admin</title>
</head>
<body>

    <a href="./" style="text-decoration: none; color: blue;">&#x21A9;</a>
    <br><br>

    <h1>Create Post</h1>
    <form action="/admin/posts/store" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea>
        <br>
        <label for="slug">Slug:</label>
        <input type="text" name="slug" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" name="author" required>
        <br>
        <label for="images">Images:</label>
        <input type="file" name="images[]" multiple>
        <br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
