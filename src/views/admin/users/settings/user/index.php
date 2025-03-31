<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | Settings</title>
    <link rel="stylesheet" href="/src/views/admin/users/settings/user/styles/index.css">
</head>
<body>
    <main>
        <a href="/admin/dashboard">← Back to Dashboard</a>
        <article>
            <header>
                <h1>User Profile</h1>
            </header>

            <section>
                <dl>
                    <div>
                        <dt>Full Name</dt>
                        <dd><?php echo htmlspecialchars($user['full_name']); ?></dd>
                    </div>

                    <div>
                        <dt>Username</dt>
                        <dd><?php echo htmlspecialchars($user['username']); ?></dd>
                    </div>

                    <div>
                        <dt>Email</dt>
                        <dd><?php echo htmlspecialchars($user['email']); ?></dd>
                    </div>

                    <div>
                        <dt>Birthday</dt>
                        <dd><?php echo htmlspecialchars($user['birthday']); ?></dd>
                    </div>

                    <?php if (isset($user['role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <div>
                            <dt class="role">Role</dt>
                            <dd><?php echo htmlspecialchars($user['role']); ?></dd>
                        </div>
                    <?php endif; ?>
                </dl>
            </section>

            <button onclick="location.href='/admin/settings/user/edit/<?php echo htmlspecialchars($user['id']); ?>'" type="button">
                Edit Profile
            </button>

            <footer>
                <small>Last Update: <mark><?php echo htmlspecialchars($user['updated_at']); ?></mark></small>
            </footer>
        </article>
    </main>
</body>
</html>