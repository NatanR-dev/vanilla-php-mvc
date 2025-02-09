<!-- getById -->
<?php if (isset($users) && is_array($users) && count($users)): ?>
    <?php foreach ($users as $user): ?>
        <ul>
            <?php foreach ($user as $campo => $valor): ?>
                <li><strong><?php echo ucfirst($campo); ?>:</strong> <?php echo htmlspecialchars($valor); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

<?php elseif(isset($user) && is_array($user)): ?>
    <!-- getAllUsers -->
    <ul>
        <?php foreach ($user as $campo => $valor): ?>
            <li><strong><?php echo ucfirst($campo); ?>:</strong> <?php echo htmlspecialchars($valor); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>