
<title><?php echo htmlspecialchars($headerData['title'] ?? 'Título padrão'); ?></title>
<h2>&#128075;Hello, welcome home!</h2>

<p>Latest posts:</p>
<?php include __DIR__ . '/../posts/index.php'; ?>

