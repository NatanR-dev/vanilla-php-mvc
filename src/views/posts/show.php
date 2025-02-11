<?php if (isset($post) && is_array($post)): ?>
    <article class="post-detail">
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($post['author']); ?></p>
        <div class="post-content">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </div>

        <?php 
        // Se houver imagens, decodifica o JSON e exibe
        if (!empty($post['images'])) {
            $images = json_decode($post['images'], true);
            if (isset($images['header'])) {
                echo '<div class="post-header-image">';
                echo '<img src="' . htmlspecialchars($images['header']) . '" alt="Imagem Header">';
                echo '</div>';
            }
            
            if (isset($images['body']) && is_array($images['body'])) {
                echo '<div class="post-body-images">';
                foreach ($images['body'] as $bodyImage) {
                    echo '<img src="' . htmlspecialchars($bodyImage) . '" alt="Imagem do Post">';
                }
                echo '</div>';
            }
        }
        ?>

        <small>Published in <?php echo htmlspecialchars($post['created_at']); ?></small>
    </article>
<?php else: ?>
    <p>Post not found...</p>
<?php endif; ?>

