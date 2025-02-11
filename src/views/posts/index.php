<h2>Posts</h2>

<?php if (isset($posts) && is_array($posts) && count($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h3>
                <a href="/posts/<?php echo htmlspecialchars($post['id']); ?>">
                    <?php echo htmlspecialchars($post['title']); ?>
                </a>
            </h3>
            <p><?php echo htmlspecialchars($post['description']); ?></p>
            <small>Published in <?php echo htmlspecialchars($post['created_at']); ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Post not found...</p>
<?php endif; ?>
