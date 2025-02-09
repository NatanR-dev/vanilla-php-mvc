<?php if (isset($users) && is_array($users) && count($users)): ?>
    <?php foreach ($users as $user): ?>
        <ul>
            <?php foreach ($user as $campo => $valor): ?>
                <li><strong><?php echo ucfirst($campo); ?>:</strong> <?php echo htmlspecialchars($valor); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhum usuário encontrado.</p>
<?php endif; ?> 