<?php if (isset($user) && is_array($user)): ?>
    <ul>
        <?php foreach ($user as $campo => $valor): ?>
            <li><strong><?php echo ucfirst($campo); ?>:</strong> <?php echo htmlspecialchars($valor); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>User not found.</p>
<?php endif; ?> 